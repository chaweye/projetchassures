<?php

namespace Vente\ArticleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vente\ArticleBundle\Entity\Chaussure
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Chaussure {
	/**
	 * @var integer $id
	 *
	private function getElement($reposi
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Pointure")
	 */
	private $pointure;

	/**
	 *
	 * @ORM\ManyToMany(targetEntity="Couleur")
	 * @ORM\JoinTable(name="couleurs_chaussures",
	 *      joinColumns={@ORM\JoinColumn(name="chaussure_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@ORM\JoinColumn(name="couleur_id", referencedColumnName="id")}
	 *      )
	 * @ORM\OrderBy({"valeur" = "ASC"})
	 */
	private $couleurs;

	/**
	 * @ORM\ManyToOne(targetEntity="Modele")
	 */
	private $modele;

	/**
	 * @var float $prix
	 *
	 * @ORM\Column(name="prix", type="float", nullable=false)
	 */
	private $prix;
	
	/**
	 * @ORM\Column(type="integer", name="quantite", nullable=true)
	 **/
	private $quantite;

	/**
	 * @var string $numero_serie
	 *
	 * @ORM\Column(name="numero_serie", type="string", length=255,nullable=false)
	 */
	private $numero_serie;

	/**
	 * @var string $matiere
	 *
	 * @ORM\Column(name="matiere", type="string", length=255, nullable=true)
	 */
	private $matiere;

	/**
	 * @var string $description
	 *
	 * @ORM\Column(name="description", type="text", nullable=true)
	 */
	private $description;

	/**
	 * @var string $courte_description
	 *
	 * @ORM\Column(name="courte_description", type="string", length=255, nullable=true)
	 */
	private $courte_description;

	/**
	 * @ORM\ManyToOne(targetEntity="Marque")
	 */
	private $marque;

	/**
	 *
	 * @ORM\Column(name="url", type="string", length=255 , unique=true , nullable=false)
	 */
	private $url;
	
	/**
	 *
	 * @ORM\Column(name="photo", type="string", length=255 , nullable=true)
	 */
	private $photo;
	
	public function __toString(){
		return $this->numero_serie;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->couleurs = new \Doctrine\Common\Collections\ArrayCollection();
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
	 * Set prix
	 *
	 * @param float $prix
	 * @return Chaussure
	 */
	public function setPrix($prix) {
		$this->prix = $prix;

		return $this;
	}

	/**
	 * Get prix
	 *
	 * @return float 
	 */
	public function getPrix() {
		return $this->prix;
	}

	/**
	 * Set numero_serie
	 *
	 * @param string $numeroSerie
	 * @return Chaussure
	 */
	public function setNumeroSerie($numeroSerie) {
		$this->numero_serie = $numeroSerie;

		return $this;
	}

	/**
	 * Get numero_serie
	 *
	 * @return string 
	 */
	public function getNumeroSerie() {
		return $this->numero_serie;
	}

	/**
	 * Set matiere
	 *
	 * @param string $matiere
	 * @return Chaussure
	 */
	public function setMatiere($matiere) {
		$this->matiere = $matiere;

		return $this;
	}

	/**
	 * Get matiere
	 *
	 * @return string 
	 */
	public function getMatiere() {
		return $this->matiere;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 * @return Chaussure
	 */
	public function setDescription($description) {
		$this->description = $description;

		return $this;
	}

	/**
	 * Get description
	 *
	 * @return string 
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Set courte_description
	 *
	 * @param string $courteDescription
	 * @return Chaussure
	 */
	public function setCourteDescription($courteDescription) {
		$this->courte_description = $courteDescription;

		return $this;
	}

	/**
	 * Get courte_description
	 *
	 * @return string 
	 */
	public function getCourteDescription() {
		return $this->courte_description;
	}

	/**
	 * Set url
	 *
	 * @param string $url
	 * @return Chaussure
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

	/**
	 * Set pointure
	 *
	 * @param Vente\ArticleBundle\Entity\Pointure $pointure
	 * @return Chaussure
	 */
	public function setPointure(
			\Vente\ArticleBundle\Entity\Pointure $pointure = null) {
		$this->pointure = $pointure;

		return $this;
	}

	/**
	 * Get pointure
	 *
	 * @return Vente\ArticleBundle\Entity\Pointure 
	 */
	public function getPointure() {
		return $this->pointure;
	}

	/**
	 * Add couleurs
	 *
	 * @param Vente\ArticleBundle\Entity\Couleur $couleurs
	 * @return Chaussure
	 */
	public function addCouleur(\Vente\ArticleBundle\Entity\Couleur $couleurs) {
		$this->couleurs[] = $couleurs;

		return $this;
	}

	/**
	 * Remove couleurs
	 *
	 * @param Vente\ArticleBundle\Entity\Couleur $couleurs
	 */
	public function removeCouleur(
			\Vente\ArticleBundle\Entity\Couleur $couleurs) {
		$this->couleurs->removeElement($couleurs);
	}

	/**
	 * Get couleurs
	 *
	 * @return Doctrine\Common\Collections\Collection 
	 */
	public function getCouleurs() {
		return $this->couleurs;
	}

	/**
	 * Set modele
	 *
	 * @param Vente\ArticleBundle\Entity\Modele $modele
	 * @return Chaussure
	 */
	public function setModele(
			\Vente\ArticleBundle\Entity\Modele $modele = null) {
		$this->modele = $modele;

		return $this;
	}

	/**
	 * Get modele
	 *
	 * @return Vente\ArticleBundle\Entity\Modele 
	 */
	public function getModele() {
		return $this->modele;
	}

	/**
	 * Set marque
	 *
	 * @param Vente\ArticleBundle\Entity\Marque $marque
	 * @return Chaussure
	 */
	public function setMarque(
			\Vente\ArticleBundle\Entity\Marque $marque = null) {
		$this->marque = $marque;

		return $this;
	}

	/**
	 * Get marque
	 *
	 * @return Vente\ArticleBundle\Entity\Marque 
	 */
	public function getMarque() {
		return $this->marque;
	}
	
	

	public function setPhoto($photo) {
		$this->photo = $photo;
		return $this;
	}
	
	public function getPhoto() {
		return $this->photo;
	}

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Chaussure
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    
        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}