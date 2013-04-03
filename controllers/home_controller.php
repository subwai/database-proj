<?php

class home_controller extends application {

	public function index() {
		return $this->fullView();
	}

	public function aboutus() {
		return $this->view();
	}

	public function howto() {
		return $this->view();
	}
}

?>