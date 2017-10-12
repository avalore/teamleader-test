<?php
//data/OrderDAO.php

require_once("entities/Order.php");
require_once("entities/Item.php");
require_once("data/ProductDAO.php");

class OrderDAO
{
	
	public function getOrder($order) {
		$items = [];
		foreach ($order["items"] as $row) {
			$productDAO = new ProductDAO();
			$product = $productDAO->getProductById($row["product-id"]);
			$item = new Item($product, $row["quantity"], $row["unit-price"], $row["total"]);
			array_push($items, $item);
		}
		$orderCls = new Order($order["id"], $order["customer-id"], $items, $order["total"]);
		return $orderCls;
	}
}

?>