<?php
class Createpallet implements iTwoColumnMaster {
    private $model;

    function __construct($model) {
        $this->model = $model;
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
                <form method="POST">
                    <fieldset>
                        <blockquote>
                            <label>Cookie</label>
                            <select name="cookie" class="span3">
                            <?php foreach ($this->model->cookies as $cookie): ?>
                                <option><?php echo ucwords(strtolower($cookie)); ?></option>
                            <?php endforeach ?>
                                <option>
                            </select>
                        </blockquote>
                        <blockquote>
                            <label>Order</label>
                            <select name="order" class="span3">
                            <?php foreach ($this->model->orders as $id => $order): ?>
                                <option value="<?php echo $id; ?>">
                                    <?php echo $order->getCustomerName()." - ".$order->getOrderDate(); ?>
                                </option>
                            <?php endforeach ?>
                                <option>
                            </select>
                        </blockquote>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </section>

    <?php /*******************************************************/ }
}

?>