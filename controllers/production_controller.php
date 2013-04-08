<?php
require_once "./models/views/production/index_view_model.php";
require_once "./models/views/production/pallet_view_model.php";
require_once "./models/db/order.php";
require_once "./models/db/pallet.php";

class production_controller extends Application {
	
	public function index() {
		$model = new IndexViewModel();

		$dates = array();
		if (!empty($_GET["daterange"])) {
			$daterange = str_replace("/", "-", $_GET["daterange"]);
			$dates = explode(" - ", $daterange);
		}

		if (!empty($_GET["daterange"]) && !empty($_GET["search"])) {
			$stmt = $this->DBCon->prepare("SELECT * FROM pallet NATURAL JOIN orders WHERE bakingDate >= ? AND bakingDate <= ? AND (barcode = ? OR cookieType LIKE ?  OR orderId = ? OR customerName LIKE ? OR location LIKE ?)");
			$like =  '%'.$_GET["search"].'%';
			$stmt->bind_param("ssisiss", $dates[0], $dates[1], $_GET["search"], $like, $_GET["search"], $like, $like);
		} else if (!empty($_GET["daterange"])) {
			$stmt = $this->DBCon->prepare("SELECT * FROM pallet NATURAL JOIN orders WHERE bakingDate >= ? AND bakingDate <= ?");
			$stmt->bind_param("ss", $dates[0], $dates[1]);
		} else if (!empty($_GET["search"])) {
			$stmt = $this->DBCon->prepare("SELECT * FROM pallet NATURAL JOIN orders WHERE barcode = ? OR cookieType LIKE ? OR orderId = ? OR customerName LIKE ? OR location LIKE ?");
			$like =  '%'.$_GET["search"].'%';
			$stmt->bind_param("isiss", $_GET["search"], $like, $_GET["search"], $like, $like);
		} else {
			$stmt = $this->DBCon->prepare("SELECT * FROM pallet NATURAL JOIN orders");
		}

		$stmt->execute();
		$res = $stmt->get_result();
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
		$stmt = $this->DBCon->prepare("SELECT type FROM cookies");
		$stmt->execute();
		$res = $stmt->get_result();
		while ($row = $res->fetch_assoc()) {
			$model->cookies[] = $row['type'];
		}
		$stmt = $this->DBCon->prepare("SELECT * FROM orders");
		$stmt->execute();
		$res = $stmt->get_result();
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
		$this->DBCon->autocommit(false);
		$stmt = $this->DBCon->prepare("INSERT INTO pallet (cookieType, orderId, bakingDate) VALUES (?, ?, CURDATE())");
		$stmt->bind_param("si", $cookie, $order);
		if ($stmt->execute()) {
			$id = $this->DBCon->insert_id;
			$stmt = $this->DBCon->prepare("UPDATE rawmaterial SET storageAmount = storageAmount - coalesce((SELECT amount FROM rawingr WHERE rawMaterialName = name AND cookieType = ?), 0)");
			$stmt->bind_param("s", $cookie);
			$stmt->execute();
			$stmt = $this->DBCon->prepare("SELECT min(storageAmount) >= 0 FROM rawmaterial WHERE name IN (SELECT rawMaterialName FROM rawingr WHERE cookieType = ?)");
			$stmt->bind_param("s", $cookie);
			$stmt->execute();
			$res = $stmt->get_result();
			$row = $res->fetch_array();
			if ($row[0]) {
				$this->DBCon->commit();
				$this->DBCon->autocommit(true);
			} else {
				$this->DBCon->rollback();
				$this->DBCon->autocommit(true);
				return $this->view("Not enough ingredients in stock.", false);
			}
			return $this->view($id); 
		} else {
			return $this->view($this->DBCon->error, false);
		}
	}

	public function editpallet() {
		if ($_POST["toggle"]) {
			$stmt = $this->DBCon->prepare("UPDATE pallet SET approved = !approved WHERE barcode = ?");
			$stmt->bind_param("i", $_GET["barcode"]);
			$stmt->execute();
		}

		$stmt = $this->DBCon->prepare("SELECT * FROM pallet WHERE barcode = ?");
		$stmt->bind_param("i", $_GET["barcode"]);
		$stmt->execute();
		$res = $stmt->get_result();
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
			$stmt = $this->DBCon->prepare("DELETE FROM pallet WHERE barcode = ?");
			$stmt->bind_param("i", $_GET["barcode"]);
			$stmt->execute();
			return $this->view($_GET["barcode"]);
		} else {
			return $this->view($_GET["barcode"], false);
		}
	}
}

?>