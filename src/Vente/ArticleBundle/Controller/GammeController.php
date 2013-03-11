<?php

namespace Vente\ArticleBundle\Controller;
use Doctrine\ORM\NoResultException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class GammeController extends Controller {
	/**
	 * @Route("/gamme/{gamme_url}/{modele_url}" ,defaults={"modele_url" = null}, name="route_gamme")
	 * @Template()
	 */
	public function indexAction($gamme_url,$modele_url) {
		$Gamme = $this->getElement('VenteArticleBundle:Gamme',$gamme_url);
		$Modele = $this->getElement('VenteArticleBundle:Modele',$modele_url);
		return array('Gamme' => $Gamme,'CurrentModele'=>$Modele);
	}
	
	private function getElement($repository,$url){
		$em = $this->getDoctrine()->getEntityManager();
		$queryBuilder = $em->createQueryBuilder();
		$queryBuilder->select('element')
		->from($repository,'element')
		->where($queryBuilder->expr()->like('element.url',$queryBuilder->expr()->literal($url)));
		$query = $queryBuilder->getQuery();
		$Element = null;
		try {
			$Element =  $query->getSingleResult();
		} catch (NoResultException $e) {
			$this->get('logger')->warn("element not found !");
		}
		return $Element;
	}
}
