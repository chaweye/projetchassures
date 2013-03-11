<?php

namespace Vente\ArticleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vente\ArticleBundle\Entity\Pointure
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pointure {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var integer $valeur
	 *
	 * @ORM\Column(name="valeur", type="integer")
	 */
	private $valeur;
	
	public function __toString(){
		return $this->valeur."";
	}

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set valeur
	 *
	 * @param integer $valeur
	 * @return Pointure
	 */
	public function setValeur($valeur) {
		$this->valeur = $valeur;

		return $this;
	}

	/**
	 * Get valeur
	 *
	 * @return integer 
	 */
	public function getValeur() {
		return $this->valeur;
	}
}