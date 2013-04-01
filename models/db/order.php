<?php

class Order {
	private $orderId;
	private $orderDate;
	private $deliveryDate;
	private $customerName;

	public function __construct($orderId, $orderDate, $deliveryDate, $customerName) {
		$this->orderId = $orderId;
		$this->orderDate = $orderDate;
		$this->deliveryDate = $deliveryDate;
		$this->customerName = $customerName;
	}

	public function getOrderId() {
		return $this->orderId;
	}

	public function getOrderDate() {
		return $this->orderDate;
	}

	public function getDeliveryDate() {
		return $this->deliveryDate;
	}

	public function getCustomerName() {
		return $this->customerName;
	}
}

?>