<?php
require_once "./models/db/cookie.php";

class material_controller extends Application {
	
	public function index() {
		$cookies = array(new Cookie("Singoalla", 0.9), new Cookie("Ballerina", 0.9));
		return $this->view($cookies);
	}
}

?>