<?php
class Deletepallet implements iTwoColumnMaster {
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
        <div class="alert alert-success">  
            <strong>Success!</strong> Deleted pallet with barcode: <?php echo $this->model; ?>
        </div>
        <a href="/production/" class="btn btn-success">Back to index</a>
    <?php else: ?>
        <form method="POST">
            <legend>Delete pallet: <?php echo $this->model; ?></legend>
            <label>Really delete pallet?</label>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn">Yes</button>
                    <a href="/production/editpallet/<?php echo $this->model; ?>" class="btn">No</a>
                </div>
            </div>
            <input name="delete" value="true" hidden />
        </form> 
    <?php endif ?>

    <?php /*******************************************************/ }
}

?>