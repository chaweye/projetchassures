<?php

namespace Vente\ArticleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vente\ArticleBundle\Entity\Gamme
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Gamme {
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
	 * @ORM\Column(name="titre", type="string", length=255, nullable=false)
	 */
	private $titre;

	/**
	 *
	 * @ORM\ManyToMany(targetEntity="Modele")
	 * @ORM\JoinTable(name="modeles_gammes",
	 *      joinColumns={@ORM\JoinColumn(name="gamme_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="modele_id", referencedColumnName="id")}
	 *      )
	 * @ORM\OrderBy({"titre" = "ASC"})
	 */
	private $modeles;

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
     * Constructor
     */
    public function __construct()
    {
        $this->modeles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Gamme
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Gamme
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Add modeles
     *
     * @param Vente\ArticleBundle\Entity\Modele $modeles
     * @return Gamme
     */
    public function addModele(\Vente\ArticleBundle\Entity\Modele $modeles)
    {
        $this->modeles[] = $modeles;
    
        return $this;
    }

    /**
     * Remove modeles
     *
     * @param Vente\ArticleBundle\Entity\Modele $modeles
     */
    public function removeModele(\Vente\ArticleBundle\Entity\Modele $modeles)
    {
        $this->modeles->removeElement($modeles);
    }

    /**
     * Get modeles
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getModeles()
    {
        return $this->modeles;
    }
}