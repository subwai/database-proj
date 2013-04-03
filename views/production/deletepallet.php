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

    <?php 
        require "./views/production/header.php"; 
        loadHeader();        
    ?>

    <?php /*******************************************************/ }

    function CenterColumn()
    { /*******************************************************/ ?>
    
    <section class="span8">
        <div class="box">
            <div class="page-header">
                <h3>Delete pallet: <?php echo $this->model; ?></h3>
            </div>
        <?php if ($this->success): ?>
            <div class="alert alert-success">  
                <strong>Success!</strong> Deleted pallet with barcode: <?php echo $this->model; ?>
            </div>
            <a href="/production/" class="btn btn-success">Back to index</a>
        <?php else: ?>
            <form method="POST">
                <label>Really delete pallet?</label>
                <blockquote>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">Yes</button>
                            <a href="/production/editpallet/<?php echo $this->model; ?>" class="btn">No</a>
                        </div>
                    </div>
                    <small>"No" will return you to the edit page.</small>
                </blockquote>
                <input name="delete" value="true" hidden />
            </form> 
        <?php endif ?>
        </div>
    </section>

    <?php /*******************************************************/ }
}

?>