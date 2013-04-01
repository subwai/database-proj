<?php
class Createpallet implements iTwoColumnMaster {
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
    
        <form method="POST">
            <fieldset>
                <legend>Create a new pallet</legend>
                <label>Cookie</label>
                <select name="cookie" class="span3">
                <?php foreach ($this->model->cookies as $cookie): ?>
                    <option><?php echo $cookie; ?></option>
                <?php endforeach ?>
                    <option>
                </select>
                <label>Order</label>
                <select name="order" class="span3">
                <?php foreach ($this->model->orders as $id => $order): ?>
                    <option value="<?php echo $id; ?>">
                        <?php echo $order->getCustomerName()." - ".$order->getOrderDate(); ?>
                    </option>
                <?php endforeach ?>
                    <option>
                </select>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>

    <?php /*******************************************************/ }
}

?>