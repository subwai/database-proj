<?php
require_once "./conf/config.php";
require_once "./base/controller.php";
require_once "./models/views/master_view_model.php";

class Application extends Controller
{
    public $Database;

    public function __construct() {
        $this->Database = new mysqli("puccini.cs.lth.se", Config::username, Config::password, Config::database);
        // $this->Database = new PDO("mysql:host=puccini.cs.lth.se;dbname=".Config::database, Config::username, Config::password);
        $this->MasterModel = new MasterViewModel();
    }

    public function onActionExecuting() {
    }

    public function onResultExecuted() {
        $this->Database = null;
    }
}

?>