<?php
class Editpallet implements iTwoColumnMaster {
    private $model;
    private $success;

    function __construct($model, $success) {
        $this->model = $model;
        $this->success = $success;
    }

    function Head()
    { /*******************************************************/ ?>


    <?php /*******************************************************/ }

    function Javascript()
    { /*******************************************************/ ?>


    <?php /*******************************************************/ }
    
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
                            <li><a href="#">Create pallet</a></li>
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
    
    <?php if ($this->success): ?>
        <form method="POST">
            <legend>Edit pallet: <?php echo $this->model->getBarcode(); ?></legend>
            <div class="control-group">
                <div class="controls">
                    <?php 
                        $icon = $this->model->getApproved() ? "ok" : "remove";
                        $background = $this->model->getApproved() ? "success" : "danger";
                    ?>
                    <button name="toggle" value="true" type="submit" class="btn btn-<?php echo $background; ?>"><i class="icon-<?php echo $icon; ?>"></i> Approved</button>
                    <a href="/production/deletepallet/<?php echo $this->model->getBarcode(); ?>" class="btn">Delete</a>
                </div>
            </div>
        </form>
    <?php else: ?>

    <?php endif ?>
        

    <?php /*******************************************************/ }
}

?>