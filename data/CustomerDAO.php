<?php
//data/CustomerDAO.php

require_once("entities/Customer.php");

class CustomerDAO {

	private $customer;

	public function getCustomerById($id) {

		$customers = json_decode(file_get_contents('https://raw.githubusercontent.com/teamleadercrm/coding-test/master/data/customers.json'));
		foreach ($customers as $row) {
			if ($id == $row->id) {
				$customer = new Customer($row->id, $row->name, $row->since, $row->revenue);
			}
		}
		return $customer;
	}
}

?>