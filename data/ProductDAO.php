<?php
//data/ProductDAO.php

require_once("entities/Product.php");

class ProductDAO {

	public function getProductById($id) {

		$products = json_decode(file_get_contents("https://raw.githubusercontent.com/teamleadercrm/coding-test/master/data/products.json"));
		foreach ($products as $row) {
			if ($id == $row->id) {
				$product = new Product($row->id, $row->description, $row->category, $row->price);
			}
		}
		return $product;
	}
}

?>