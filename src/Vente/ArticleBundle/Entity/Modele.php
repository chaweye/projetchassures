<?php

namespace Vente\ArticleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vente\ArticleBundle\Entity\Modele
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Modele {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 *
	 * @ORM\ManyToMany(targetEntity="Chaussure")
	 * @ORM\JoinTable(name="modeles_chaussures",
	 *      joinColumns={@ORM\JoinColumn(name="modele_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="chaussure_id", referencedColumnName="id")}
	 *      )
	 * @ORM\OrderBy({"prix" = "ASC"})
	 */
	private $chaussures;

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
	
	/**
	 * @ORM\ManyToOne(targetEntity="Gamme")
	 */
	private $gamme;
	
	public function __toString(){
		return $this->titre;
	}

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->chaussures = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Modele
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
     * @return Modele
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
     * Add chaussures
     *
     * @param Vente\ArticleBundle\Entity\Chaussure $chaussures
     * @return Modele
     */
    public function addChaussure(\Vente\ArticleBundle\Entity\Chaussure $chaussures)
    {
        $this->chaussures[] = $chaussures;
    
        return $this;
    }

    /**
     * Remove chaussures
     *
     * @param Vente\ArticleBundle\Entity\Chaussure $chaussures
     */
    public function removeChaussure(\Vente\ArticleBundle\Entity\Chaussure $chaussures)
    {
        $this->chaussures->removeElement($chaussures);
    }

    /**
     * Get chaussures
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChaussures()
    {
        return $this->chaussures;
    }

    /**
     * Set gamme
     *
     * @param \Vente\ArticleBundle\Entity\Gamme $gamme
     * @return Modele
     */
    public function setGamme(\Vente\ArticleBundle\Entity\Gamme $gamme = null)
    {
        $this->gamme = $gamme;
    
        return $this;
    }

    /**
     * Get gamme
     *
     * @return \Vente\ArticleBundle\Entity\Gamme 
     */
    public function getGamme()
    {
        return $this->gamme;
    }
}