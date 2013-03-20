<?php

class Cookie {
	private $type;
	private $quality_standard;

	public function __construct($type, $qs) {
		$this->type = $type;
		$this->quality_standard = $qs;
	}

	public function getType() {
		return $this->type;
	}

	public function getQualityStandard() {
		return $this->quality_standard;
	}
}

?>