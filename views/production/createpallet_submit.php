<?php
class Createpallet_submit implements iTwoColumnMaster {
    private $model;

    function __construct($model) {
        $this->model = $model;
    }

    function Header()
    { /*******************************************************/ ?>

        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/production">Production</a>
                    <div class="nav-collapse collapse navbar-responsive-collapse">
                        <ul class="nav">
                            <li><a href="/production/index">Track pallet</a></li>
                            <li class="active"><a href="#">Create pallet</a></li>
                            <li><a href="#">Quality check</a></li>
                        </ul>
                        <ul class="nav pull-right">
                            <li class="divider-vertical"></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">How to</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">About us</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    <?php /*******************************************************/ }

    function CenterColumn()
    { /*******************************************************/ ?>
    
        <div class="alert alert-success">  
            <strong>Success!</strong> Created pallet with barcode: <?php echo $this->model; ?>
        </div>
        <a href="/production/createpallet" class="btn btn-success">Create another pallet</a>

    <?php /*******************************************************/ }
}

?>