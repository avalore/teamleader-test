<?php
//discount.php

require_once("data/OrderDAO.php");
require_once("data/CustomerDAO.php");
// require_once("entities/Product.php");
sdf
$orderDecode = json_decode(file_get_contents('php://input'),true);
if (!empty($orderDecode)) {

	$orderDAO = new OrderDAO();
	$order = $orderDAO->getOrder($orderDecode);

	$customerDAO = new CustomerDAO();
	$customer = $customerDAO->getCustomerById($order->getCustomerId());

	print($order->getCustomerId());
	var_dump($order);
	var_dump($customer);

	// $products = json_decode(file_get_contents("https://raw.githubusercontent.com/teamleadercrm/coding-test/master/data/products.json"));

	//header('Content-type: application/json');
	//return json_encode($order);

}
// } else {
// 	$array = [
// 		"error" => true];
// 	header('Content-type: application/json');
// 	echo(json_encode($array));
// 	//return json_encode($array);
// }
	


?>