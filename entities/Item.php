<?php
//entities/Item.php


class Item
{
	private $product;
	private $quantity;
	private $price;
	private $total;
	
	public function __construct($product, $quantity, $price, $total)
	{
		$this->product = $product;
		$this->quantity = $quantity;
		$this->price = $price;
		$this->total = $total;
	}

	public function getProduct() {return $this->product;}
	public function getQuantity() {return $this->quantity;}
	public function getPrice() {return $this->price;}
	public function getTotal() {return $this->total;}
}

?>