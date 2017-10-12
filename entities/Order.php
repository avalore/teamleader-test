<?php
//entities/Order.php

require_once("entities/Item.php");


class Order
{
	private $orderId;
	private $customerId;
	private $items;
	private $total;

	public function __construct($orderId, $customerId, $listItems, $total)
	{
		$this->orderId = $orderId;
		$this->customerId = $customerId;
		$this->items = $listItems;
		$this->total = $total;
	}

	public function getOrderId() {return $this->orderId;}
	public function getCustomerId() {return $this->customerId;}
	public function getItems() {return $this->items;}
	public function getTotal() {return $this->total;}

	public function setTotal($total) {$this->total = $total;}
}
?>