<?php

class Pallet {
	private $barcode;
	private $cookieType;
	private $location;
	private $customer;
	private $orderId;
	private $bakingDate;
	private $approved;

	public function __construct($barcode, $cookieType, $location, $customer, $orderId, $bakingDate, $approved) {
		$this->barcode = $barcode;
		$this->cookieType = $cookieType;
		$this->location = $location;
		$this->customer = $customer;
		$this->orderId = $orderId;
		$this->bakingDate = $bakingDate;
		$this->approved = $approved;
	}

	public function getBarcode() {
		return $this->barcode;
	}

	public function getCookieType() {
		return $this->cookieType;
	}

	public function getLocation() {
		return $this->location;
	}

	public function getCustomer() {
		return $this->customer;
	}

	public function getOrderId() {
		return $this->orderId;
	}

	public function getBakingDate() {
		return $this->bakingDate;
	}

	public function getApproved() {
		return $this->approved;
	}
}

?>