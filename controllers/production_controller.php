<?php
require_once "./models/db/pallet.php";

class production_controller extends Application {
	
	public function index() {
		
		return $this->view();
	}
}

?>