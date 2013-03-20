<?php
require_once "./base/results/view_result.php";

class Controller
{
    public $MasterModel;

    public function onActionExecuting() {
    }

    public function onActionExecuted() {
    } 

    public function onResultExecuting() {
    }   

    public function onResultExecuted() {
    }

    public function view($model = array(), $viewName = null, $masterName = null) {
        $viewFile = "./views";
        $viewFile .= "/".$_GET["controller"];
        $viewFile .= "/".$_GET["view"];
        $viewFile .= ".php";

        if (file_exists($viewFile)) {
            $files = array_diff(scandir("./interfaces/"), array('..', '.'));
            foreach ($files as $file) {
                if (preg_match("/.*php/", $file)) {
                    include "./interfaces/".$file;
                }
            }
            require $viewFile;
            $viewName = is_null($viewName) ? ucfirst($_GET["view"]) : $viewName;
            $view = new $viewName($model);
            $masterName = is_null($masterName) ? substr(array_shift(class_implements($view)), 1) : $masterName;
            return new ViewResult($this->MasterModel, $view, $masterName);
        } else {
            echo "404";
        }        
    }

    public function json($model = array()) {

    }

    public function fullView($model = array(), $viewName = null) {
        $viewFile = "./views";
        $viewFile .= "/".$_GET["controller"];
        $viewFile .= "/".$_GET["view"];
        $viewFile .= ".php";

        if (file_exists($viewFile)) {
            $viewName = is_null($viewName) ? ucfirst($_GET["view"]) : $viewName;
            include $viewFile;
        }
    }
}
?>