<?php
//entities/Item.php


class Item
{
	private $productId;
	private $quantity;
	private $price;
	private $total;
	
	public function __construct($productId, $quantity, $price, $total)
	{
		$this->productId = $productId;
		$this->quantity = $quantity;
		$this->price = $price;
		$this->total = $total;
	}

	public function getProductId() {return $this->productId;}
	public function getQuantity() {return $this->quantity;}
	public function getPrice() {return $this->price;}
	public function getTotal() {return $this->total;}
}

?>