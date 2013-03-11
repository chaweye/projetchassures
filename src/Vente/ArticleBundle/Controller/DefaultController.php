<?php

namespace Vente\ArticleBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Doctrine\ORM\NoResultException;

class DefaultController extends Controller {
	/**
	 * @Route("/")
	 * @Template()
	 */
	public function indexAction() {
		return array();
	}
	
	/**
	 * @Route("/menu/{current_gamme_url}", requirements={"current_gamme_url" = "\w+"},defaults={"current_gamme_url" = "inexistant_route"}, name="route_menu")
	 * @Template
	 */
	public function menuAction($current_gamme_url) {
		$em = $this->getDoctrine()->getEntityManager();
		$queryBuilder = $em->createQueryBuilder();
		$queryBuilder->select('gamme')
				->from('VenteArticleBundle:Gamme','gamme');
		$query = $queryBuilder->getQuery();
		try {
			$Gammes =  $query->getResult();
		} catch (NoResultException $exception) {
			$Gammes = null;
			$this->get('logger')->warn("gamme non trouvée");
		}
		
		$queryBuilder->where($queryBuilder->expr()->like('gamme.url',$queryBuilder->expr()->literal($current_gamme_url)));
		$query = $queryBuilder->getQuery();
		try {
			$CurrentGamme =  $query->getSingleResult();
		} catch (NoResultException $e) {
			
			$CurrentGamme = null;
		}
		
		return array('Gammes' => $Gammes,'CurrentGamme'=>$CurrentGamme);
	}
	
}
