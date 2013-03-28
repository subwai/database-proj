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
                            <li class="active"><a href="/production/index">Home</a></li>
                            <li><a href="#">Create pallet</a></li>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry the Bird</td>
                    <td></td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>

    <?php /*******************************************************/ }
}

?>