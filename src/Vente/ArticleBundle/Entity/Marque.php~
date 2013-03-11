<?php

namespace Vente\ArticleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vente\ArticleBundle\Entity\Marque
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Marque {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string $titre
	 *
	 * @ORM\Column(name="titre", type="string", length=255)
	 */
	private $titre;

	/**
	 * @var string $url
	 *
	 * @ORM\Column(name="url", type="string", length=255, unique=true)
	 */
	private $url;

	
	public function __toString(){
		return $this->titre;
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
	 * Set titre
	 *
	 * @param string $titre
	 * @return Marque
	 */
	public function setTitre($titre) {
		$this->titre = $titre;

		return $this;
	}

	/**
	 * Get titre
	 *
	 * @return string 
	 */
	public function getTitre() {
		return $this->titre;
	}

	/**
	 * Set url
	 *
	 * @param string $url
	 * @return Marque
	 */
	public function setUrl($url) {
		$this->url = $url;

		return $this;
	}

	/**
	 * Get url
	 *
	 * @return string 
	 */
	public function getUrl() {
		return $this->url;
	}
}