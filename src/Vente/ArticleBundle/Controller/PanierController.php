<?php
namespace Vente\ArticleBundle\Controller;
use Vente\ArticleBundle\Entity\Item;

use Vente\ArticleBundle\Entity\Panier;

use Doctrine\ORM\NoResultException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PanierController extends Controller {

	/**
	 * @Route("/panier/monpanier", name="route_panier")
	 * @Template()
	 */
	public function indexAction() {
		$Panier = $this->getPanier();
		if ($Panier->getItems()->count() == 0) {
			return new RedirectResponse('/');
		}
		return array("Panier" => $Panier);
	}

	private function getPanier() {
		$Panier = new Panier();
		$Panier_session = $this->getRequest()->getSession()
				->get('Panier', array());
		foreach ($Panier_session as $chaussure_id => $quantite) {
			$Chaussure = $this->getDoctrine()->getEntityManager()
					->find('VenteArticleBundle:Chaussure', $chaussure_id);
			$Item = new Item($Chaussure, $quantite);
			$Panier->addItem($Item);
		}
		return $Panier;
	}

	/**
	 * @Route("/panier/total", name="route_panier_total")
	 */
	public function totalAction() {
		$Panier = $this->getPanier();
		$Total = 0;
		foreach ($Panier->getItems() as $Item) {
			$Total = $Total
					+ ($Item->getArticle()->getPrix() * $Item->getQuantite());
		}
		return new Response(
				$Panier->getItems()->count() . " art. : "
						. number_format($Total, 2, ',', ' '));
	}
	/**
	 * @Route("/panier/add", name="route_panier_add")
	 * @Method({"POST"})
	 */
	public function addAction() {
		$id = $this->getRequest()->get('id');
		$Chaussure = $this->getDoctrine()->getEntityManager()
				->find('VenteArticleBundle:Chaussure', $id);
		if ($Chaussure->getQuantite() > 0) {
			$session = $this->getRequest()->getSession();
			$Panier_session = $session->get('Panier', array());
			$Panier_session[$id] = $this->getRequest()->get('quantite');
			$this->getRequest()->getSession()->set('Panier', $Panier_session);
			return new RedirectResponse($this->generateUrl('route_panier'));
		} else {
			$this->get('session')->getFlashBag()
					->add('notice', 'En rupture de stock !');
			return new RedirectResponse($this->generateUrl('route_panier'));
		}
	}

	/**
	 * @Route("/panier/remove", name="route_panier_remove")
	 * @Method({"POST"})
	 */
	public function removeAction() {
		$session = $this->getRequest()->getSession();
		$Panier_session = $session->get('Panier', array());
		$id = $this->getRequest()->get('id');
		unset($Panier_session[$id]);
		$this->getRequest()->getSession()->set('Panier', $Panier_session);
		return new RedirectResponse($this->generateUrl('route_panier'));
	}

}
