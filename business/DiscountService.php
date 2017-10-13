<?php
//business/DiscountService.php

class DiscountService {

	public function discountZero($discount, $order) {
		
		foreach ($order->getItems() as $item) {
			$discount["discounts"][$item->getProduct()->getProductId()] = 0;
			$quantity = 0;
			$counter = 0;
			if ($item->getProduct()->getCategory() == "2") {
				$quantity += $item->getQuantity();
				$counter = floor($quantity/6);
				if ($counter >= 1) {
					$discount["discounts"][$item->getProduct()->getProductId()] = -($item->getPrice()*$counter);
				}
			}
		}
		return $discount;
	}

	public function discountOne($discount, $order) {

		$discount["discounts"]["tools"] = 0;
		$counter = 0;
		$priceList = [];
		foreach ($order->getItems() as $item) {
			if ($item->getProduct()->getCategory() == "1") {
				$counter++;
				array_push($priceList, $item->getTotal());
			}
		}
		if ($counter >= 2) {
			$discount["discounts"]["tools"] = -((min($priceList)/100)*20);
		}
		return $discount;
	}

	public function discountTwo($discount, $customer, $order) {
		
		$discount["discounts"]["revenue exceeds 1000"] = 0;
		if ($customer->getRevenue() > 1000) {
			$discount["discounts"]["revenue exceeds 1000"] = -(($order->getTotal()/100)*10);
		}
		return $discount;
	}
}

?>