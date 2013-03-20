<?php
require_once "./conf/config.php";
require_once "./base/controller.php";
require_once "./base/database.inc.php";
require_once "./models/views/master_view_model.php";

class Application extends Controller
{
    public $Database;

    public function __construct() {
        $config = new Config();
        $this->Database = new Database($config->username, $config->password, $config->database);
        $this->MasterModel = new MasterViewModel();
    }

    public function onActionExecuting() {
    }

    public function onResultExecuted() {
        $this->Database->closeConnection();
    }
}

?>