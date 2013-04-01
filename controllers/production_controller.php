<?php
require_once "./models/views/production/index_view_model.php";
require_once "./models/views/production/pallet_view_model.php";
require_once "./models/db/order.php";
require_once "./models/db/pallet.php";

class production_controller extends Application {
	
	public function index() {
		$model = new IndexViewModel();
		$res = $this->Database->query("SELECT * FROM pallet");
		while ($row = $res->fetch_assoc()) {
			$barcode = $row['barCode'];
			$cookieType = $row['cookieType'];
			$orderId = $row['orderId'];
			$approved = $row['approved'];
			$bakingDate = $row['bakingDate'];
			$model->pallets[] = new Pallet($barcode, $cookieType, $orderId, $bakingDate, $approved);
		}
		return $this->view($model);
	}

	public function createpallet() {
		$model = new PalletViewModel();
		$res = $this->Database->query("SELECT type FROM cookies");
		while ($row = $res->fetch_assoc()) {
			$model->cookies[] = ucwords(strtolower($row['type']));
		}
		$res = $this->Database->query("SELECT * FROM orders");
		while ($row = $res->fetch_assoc()) {
			$id = $row['orderId'];
			$orderDate = $row['orderDate'];
			$deliveryDate = $row['deliveryDate'];
			$customerName = $row['customerName'];
			$model->orders[$id] = new Order($id, $orderDate, $deliveryDate, $customerName);
		}
		return $this->view($model);
	}

	public function createpallet_submit() {
		$cookie = strtolower($_POST["cookie"]);
		$order = $_POST["order"];
		$this->Database->query("INSERT INTO pallet (cookieType, orderId, productionDate) VALUES ('".$cookie."', ".$order.", CURDATE())");
		return $this->view($this->Database->insert_id);
	}
}

?>