<?php
class Index implements iTwoColumnMaster {
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
                            <li class="active"><a href="/production/index">Track pallet</a></li>
                            <li><a href="/production/createpallet">Create pallet</a></li>
                            <li><a href="#">Quality check</a></li>
                        </ul>
                        <form class="navbar-search pull-left">
                            <input type="text" class="search-query span2" placeholder="Search">
                        </form>
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
    
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cookie Type</th>
                    <th>Order Id</th>
                    <th>Baking Date</th>
                    <th class="approved-th">Approved</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($this->model->pallets as $pallet): ?>
                <tr>
                    <td><?php echo $pallet->getBarcode(); ?></td>
                    <td><?php echo $pallet->getCookieType(); ?></td>
                    <td><?php echo $pallet->getOrderId(); ?></td>
                    <td><?php echo $pallet->getBakingDate(); ?></td>
                    <td>
                        <?php 
                            $icon = $pallet->getApproved() ? "ok" : "remove";
                            $background = $pallet->getApproved() ? "success" : "danger";
                        ?>
                        <div class="input-prepend approved-td">
                            <span class="add-on btn-<?php echo $background; ?>"><i class="icon-<?php echo $icon; ?>"></i></span>
                        </div>
                        <div class="btn-group edit-group">
                            <div></div>
                            <a href="#" class="btn"><i class="icon-pencil"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>

    <?php /*******************************************************/ }
}

?>