<?php

namespace Vente\ArticleBundle\Controller;
use Doctrine\ORM\NoResultException;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class RechercheController extends Controller {

	/**
	 * @Route("/recherche" , name="route_search")
	 * @Template()
	 */
	public function indexAction() {
		$search = $this->getRequest()->get('search');
		$em = $this->getDoctrine()->getEntityManager();
		$queryBuilder = $em->createQueryBuilder();
		$queryBuilder->select('chaussure')
				->from('VenteArticleBundle:Chaussure','chaussure')
				->leftjoin('chaussure.modele','modele')
				->leftjoin('modele.gamme','gamme')
				->leftjoin('chaussure.marque','marque')
				
				->where(
						$queryBuilder->expr()->orx (
						    $queryBuilder->expr()->like('gamme.titre',$queryBuilder->expr()->literal('%'.$search.'%')),
						    $queryBuilder->expr()->like('modele.titre',$queryBuilder->expr()->literal('%'.$search.'%')),
							$queryBuilder->expr()->like('marque.titre',$queryBuilder->expr()->literal('%'.$search.'%')),
							$queryBuilder->expr()->like('chaussure.description' , $queryBuilder->expr()->literal('%'.$search.'%'))
						)
					);
		$Chaussures = $queryBuilder->getQuery()->getResult();
		$this->get('session')->getFlashBag()
		->add('searchkeys',$search);
		return array('Chaussures' => $Chaussures,'Search'=>$search);
	}
}

