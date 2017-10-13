<?php
//discount.php

require_once("data/OrderDAO.php");
require_once("data/CustomerDAO.php");
require_once("data/ProductDAO.php");
require_once("business/DiscountService.php");

$discount = [];

$orderDecode = json_decode(file_get_contents('php://input'),true);
if (!empty($orderDecode)) {

	$orderDAO = new OrderDAO();
	$order = $orderDAO->getOrder($orderDecode);

	$customerDAO = new CustomerDAO();
	$customer = $customerDAO->getCustomerById($order->getCustomerId());

	$discountSvc = new DiscountService();
	$discount = $discountSvc->discountZero($discount, $order);

	$discount = $discountSvc->discountOne($discount, $order);

	$discountSubTotal = 0;
	foreach ($discount["discounts"] as $reduction) {
		$discountSubTotal += $reduction;
	}
	$currentTotal = $order->getTotal()+$discountSubTotal;
	$order->setTotal($currentTotal);

	$discount = $discountSvc->discountTwo($discount, $customer, $order);

	$discount["overview"]["order total"] = $order->getTotal();
	$discount["overview"]["order total"] += $discount["discounts"]["revenue exceeds 1000"];
	$discount["overview"]["total discount"] = $discountSubTotal+$discount["discounts"]["revenue exceeds 1000"];

	var_dump($discount);
	
	header('Content-type: application/json');
	return json_encode($discount);

} else {
	$discount["error"] = "json error";
	header('Content-type: application/json');
	return json_encode($discount);
}
	


?>