<?php
class Aboutus implements iTwoColumnMaster {
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

        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <ul class="nav">
                        <li><a href="/material">Material</a></li>
                        <li><a href="/production">Production</a></li>
                        <li><a href="/sales">Sales</a></li>
                    </ul>
                    <ul class="nav pull-right">
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/home/howto">How to</a></li>
                            <li class="divider"></li>
                            <li><a href="/home/aboutus">About us</a></li>
                        </ul>
                    </li>
                </ul>
                </div>
            </div>
        </div> 

    <?php /*******************************************************/ }

    function CenterColumn()
    { /*******************************************************/ ?>
    
        <section class="span8"> 
            <div class="page-header">
                <h1>About us</h1>
            </div>
            <h3>Contacts</h3>
            <address>
                <strong>Adam Hansson Lyr&eacute;n</strong><br>
                dic11aha@student.lu.se<br>
                Lunds Tekniska H&ouml;gskola
            </address>
            <address>
                <strong>Mergim Rama</strong><br>
                dic11mra@student.lu.se<br>
                Lunds Tekniska H&ouml;gskola
            </address>
        </section>

    <?php /*******************************************************/ }
}

?>