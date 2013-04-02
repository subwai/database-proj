<?php
require_once "./models/views/production/index_view_model.php";
require_once "./models/views/production/pallet_view_model.php";
require_once "./models/db/order.php";
require_once "./models/db/pallet.php";

class production_controller extends Application {
	
	public function index() {
		$model = new IndexViewModel();
		$query = "SELECT * FROM pallet NATURAL JOIN orders";
		$first = true;
		if (!empty($_GET["daterange"])) {
			$daterange = str_replace("/", "-", $_GET["daterange"]);
			$dates = explode(" - ", $daterange);
			$query .= sprintf(" WHERE bakingDate >= '%s' AND bakingDate <= '%s'", $dates[0], $dates[1]);
			$first = false;
		}

		if (!empty($_GET["search"])) {
			$query .= $first ? " WHERE " : " AND ";
			$query .= sprintf("cookieType LIKE '%%%s%%'", $_GET["search"]);
		}

		$res = $this->DBCon->query($query);
		while ($row = $res->fetch_assoc()) {
			$barcode = $row['barCode'];
			$cookieType = $row['cookieType'];
			$location = $row['location'];
			$customer = $row['customerName'];
			$orderId = $row['orderId'];
			$approved = $row['approved'];
			$bakingDate = $row['bakingDate'];
			$model->pallets[] = new Pallet($barcode, $cookieType, $location, $customer, $orderId, $bakingDate, $approved);
		}
		return $this->view($model);
	}

	public function createpallet() {
		$model = new PalletViewModel();
		$res = $this->DBCon->query("SELECT type FROM cookies");
		while ($row = $res->fetch_assoc()) {
			$model->cookies[] = $row['type'];
		}
		$res = $this->DBCon->query("SELECT * FROM orders");
		while ($row = $res->fetch_assoc()) {
			$id = $row['orderId'];
			$orderDate = $row['orderDate'];
			$deliveryDate = $row['deliveryDate'];
			$customerName = $row['customerName'];
			$model->orders[$id] = new Order($id, $orderDate, $deliveryDate, $customerName);
		}
		return $this->view($model);
	}

	public function createpallet_post() {
		$cookie = strtolower($_POST["cookie"]);
		$order = $_POST["order"];
		if ($this->DBCon->query(sprintf("INSERT INTO pallet (cookieType, orderId, bakingDate) VALUES ('%s', %d, CURDATE())", $cookie, $order))) {
			$id = $this->DBCon->insert_id;
			$this->DBCon->query(sprintf("UPDATE rawmaterial SET storageAmount = storageAmount - coalesce((SELECT amount FROM rawingr WHERE rawMaterialName = name AND cookieType = '%s'), 0)", $cookie));
		    return $this->view($id); 
		} else {
			return $this->view($this->DBCon->error, false);
		}
	}

	public function editpallet() {
		if ($_POST["toggle"]) {
			$this->DBCon->query(sprintf("UPDATE pallet SET approved = !approved WHERE barcode = %d", $_GET["barcode"]));
		}

		$res = $this->DBCon->query(sprintf("SELECT * FROM pallet WHERE barcode = %d", $_GET["barcode"]));
		if ($res->num_rows > 0) {
			$row = $res->fetch_assoc();
			$barcode = $row['barCode'];
			$cookieType = $row['cookieType'];
			$location = $row['location'];
			$orderId = $row['orderId'];
			$approved = $row['approved'];
			$bakingDate = $row['bakingDate'];
			$model = new Pallet($barcode, $cookieType, $location, null, $orderId, $bakingDate, $approved);
			return $this->view($model);
		} else {
			return $this->view($_GET["barcode"], false);
		}
	}

	public function deletepallet() {
		if ($_POST["delete"]) {
			$this->DBCon->query(sprintf("DELETE FROM pallet WHERE barcode = %d", $_GET["barcode"]));
			return $this->view($_GET["barcode"]);
		} else {
			return $this->view($_GET["barcode"], false);
		}
	}
}

?>