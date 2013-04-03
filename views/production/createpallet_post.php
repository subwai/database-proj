<?php
class Createpallet_post implements iTwoColumnMaster {
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

    <?php 
        require "./views/production/header.php"; 
        loadHeader("createpallet");        
    ?>

    <?php /*******************************************************/ }

    function CenterColumn()
    { /*******************************************************/ ?>
    
    <section class="span8">
        <div class="box">
            <div class="page-header">
                <h3>Create a new pallet</h3>
            </div>
        <?php if ($this->success): ?>
            <div class="alert alert-success">  
                <strong>Success!</strong> Created pallet with barcode: <?php echo $this->model; ?>
            </div>
            <a href="/production/createpallet" class="btn btn-success">Create another pallet</a>
        <?php else: ?>
            <div class="alert alert-error">  
                <strong>Error!</strong> Error message: <?php echo $this->model; ?>
            </div>
            <a href="/production/createpallet" class="btn btn-success">Create another pallet</a>
        <?php endif ?>
    </div>
    </section>
        

    <?php /*******************************************************/ }
}

?>