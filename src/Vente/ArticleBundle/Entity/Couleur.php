<?php

namespace Vente\ArticleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vente\ArticleBundle\Entity\Couleur
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Couleur {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string $valeur
	 *
	 * @ORM\Column(name="valeur", type="string", length=255, nullable=false)
	 */
	private $valeur;

	/**
	 * @var string $hexa
	 *
	 * @ORM\Column(name="hexa", type="string", length=255, nullable=true)
	 */
	private $hexa;
	
	public function __toString(){
		return $this->valeur;
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
	 * @param string $valeur
	 * @return Couleur
	 */
	public function setValeur($valeur) {
		$this->valeur = $valeur;

		return $this;
	}

	/**
	 * Get valeur
	 *
	 * @return string 
	 */
	public function getValeur() {
		return $this->valeur;
	}

	/**
	 * Set hexa
	 *
	 * @param string $hexa
	 * @return Couleur
	 */
	public function setHexa($hexa) {
		$this->hexa = $hexa;

		return $this;
	}

	/**
	 * Get hexa
	 *
	 * @return string 
	 */
	public function getHexa() {
		return $this->hexa;
	}
}