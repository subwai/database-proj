<?php

class Route {
    
    private $Path;
    private $Defaults;

    public function __construct($path, $defaults) {
        $this->Path = $path;
        $this->Defaults = $defaults;
    }

    public function getPath() {
        return $this->Path;
    }

    public function getDefaults() {
        return $this->Defaults;
    }
}


?>