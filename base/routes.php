<?php
require_once "./models/route.php";

$routes = array(
	new Route("^(?<controller>production)/(?<view>\w+)/?(?<barcode>\d+)?.*", array(
		"barcode" => null
	)),
    new Route("^(?<controller>\w+)?/?(?<view>\w+)?.*", array(
        "controller" => "home",
        "view" => "index"
    ))
)

?>