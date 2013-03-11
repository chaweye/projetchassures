<?php
namespace Vente\ArticleBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Vente\ArticleBundle\Entity\Panier
 *
 */
class Panier {
	private $items;
	/**
	 * Constructor
	 */
	public function __construct() {

		$this->items = new \Doctrine\Common\Collections\ArrayCollection();
	}


	public function addItem(\Vente\ArticleBundle\Entity\Item $items) {

		$this->items[] = $items;

		return $this;
	}

	public function removeItem(\Vente\ArticleBundle\Entity\Item $items) {
		$this->items->removeElement($items);
	}


	public function getItems() {
		return $this->items;

	}
}