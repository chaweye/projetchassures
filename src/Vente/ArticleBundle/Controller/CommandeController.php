<?php

namespace Vente\ArticleBundle\Controller;
use Doctrine\ORM\NoResultException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Swift_Message;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Vente\ArticleBundle\Entity\Panier;
use Vente\ArticleBundle\Entity\Item;


class CommandeController extends Controller {
	/**
	 * @Route("/commande" , name="route_commande")
	 */
	public function indexAction() {
		$user = $this->getUser();
		$message = Swift_Message::newInstance()->setSubject('Votre commande de chaussures')
		->setFrom('no-replay.projet@m2.com')
		->setTo($user->getEmail())
		->setBody(
				$this->renderView(
						'VenteArticleBundle:Template:emailValidationCommande.html.twig',
						array('User' => $user, 'Panier'=>$this->getPanier())))
		->setCharset('UTF-8')
        ->setContentType('text/html');
		$this->get('mailer')->send($message);
		$this->getRequest()->getSession()->remove('Panier');
		return new RedirectResponse('/');
	}
	private function getPanier() {
		$Panier = new Panier();
		$em = $this->getDoctrine()->getEntityManager();
		$Panier_session = $this->getRequest()->getSession()
				->get('Panier', array());
		foreach ($Panier_session as $chaussure_id => $quantite) {
			$Chaussure = $em
					->find('VenteArticleBundle:Chaussure', $chaussure_id);
			$Chaussure->setQuantite($Chaussure->getQuantite() - 1);
			$em->persist($Chaussure);
			$em->flush();
			$Item = new Item($Chaussure, $quantite);
			$Panier->addItem($Item);
		}
		return $Panier;
	}

	
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
	
	
}
