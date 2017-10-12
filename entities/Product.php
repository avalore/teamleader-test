<?php
//entities/Product.php

class Product
{
	private $productId;
	private $description;
	private $category;
	private $price;
	
	public function __construct($productId, $description, $category, $price)
	{
		$this->productId = $productId;
		$this->description = $description;
		$this->category = $category;
		$this->price = $price;
	}

	public function getProductId() {return $this->productId;}
	public function getDescription() {return $this->description;}
	public function getCategory() {return $this->category;}
	public function getPrice() {return $this->price;}
}

?>