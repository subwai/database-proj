<?php

class Pallet {
	private $barcode;
	private $cookieType;
	private $orderId;
	private $bakingDate;
	private $approved;

	public function __construct($barcode, $cookieType, $orderId, $bakingDate, $approved) {
		$this->barcode = $barcode;
		$this->cookieType = $cookieType;
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

	public function getOrderId() {
		return $this->orderId;
	}

	public function getBakingDate() {
		return $this->bakingDate;
	}

	public function getApproved() {
		return $this->approved == "Yes";
	}
}

?>