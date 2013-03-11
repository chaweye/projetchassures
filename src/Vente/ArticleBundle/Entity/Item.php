<?php
namespace Vente\ArticleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Vente\ArticleBundle\Entity\Item
 */

class Item {

	private $article;

	private $quantite;

	public function __construct(Chaussure $article, $quantite) {

		$this->article = $article;
		$this->quantite = $quantite;
	}

	/**
	 * Set quantite
	 *
	 * @param integer $quantite
	 * @return Item
	 */

	public function setQuantite($quantite) {

		$this->quantite = $quantite;
		return $this;
	}

	/**
	 * Get quantite
	 *
	 * @return integer
	 */
	public function getQuantite() {

		return $this->quantite;
	}

	public function setArticle(
			\Vente\ArticleBundle\Entity\Chaussure $article = null) {

		$this->article = $article;
		return $this;
	}

	/**
	 * Get article
	 *	 *
	
	 * @return \Projet\ArticleBundle\Entity\Chaussure
	 */
	public function getArticle() {

		return $this->article;
	}
}