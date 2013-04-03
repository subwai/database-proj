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

    <?php 
        require "./views/production/header.php"; 
        loadHeader();        
    ?>

    <?php /*******************************************************/ }

    function CenterColumn()
    { /*******************************************************/ ?>
    
    <section class="span8">
        <div class="box">
        <?php if ($this->success): ?>
            <div class="page-header">
                <h3>Edit pallet: <?php echo $this->model->getBarcode(); ?></h3>
            </div>
            <form method="POST">
                <?php 
                    $icon = $this->model->getApproved() ? "ok" : "remove";
                    $background = $this->model->getApproved() ? "success" : "danger";
                ?>
                <blockquote>
                    <button name="toggle" value="true" type="submit" class="btn btn-<?php echo $background; ?>"><i class="icon-<?php echo $icon; ?>"></i> Approved</button>
                    <small>Press to toggle approved on/off</small>
                </blockquote>
                <blockquote>
                    <a href="/production/deletepallet/<?php echo $this->model->getBarcode(); ?>" class="btn">Delete</a>
                </blockquote>
    
            </form>
        <?php else: ?>
            <div class="page-header">
                <h3>Edit pallet: Error</h3>
            </div>
            <div class="alert alert-error">  
                <strong>Error!</strong> Pallet with barcode: <?php echo $this->model; ?>, does not exist.
            </div>
        <?php endif ?>
        </div>
        <a href="/production" class="btn btn-info">Back to pallet tracking</a>
    </div>
        

    <?php /*******************************************************/ }
}

?>