<?php
//entities/Customer.php


class Customer
{
	private $customerId;
	private $name;
	private $since;
	private $revenue;
	
	public function __construct($customerId, $name, $since, $revenue)
	{
		$this->customerId = $customerId;
		$this->name = $name;
		$this->since = $since;
		$this->revenue = $revenue;
	}

	public function getCustomerId() {return $this->customerId;}
	public function getName() {return $this->name;}
	public function getSince() {return $this->since;}
	public function getRevenue() {return $this->revenue;}
}

?>