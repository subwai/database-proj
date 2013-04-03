<?php

function loadHeader($active = "", $search = false)
{ /*******************************************************/ ?>

<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="/production">Production</a>
            <ul class="nav">
                <li<?php echo $active == "index" ? " class=\"active\"" : ""; ?>><a href="/production/index">Track pallet</a></li>
                <li<?php echo $active == "createpallet" ? " class=\"active\"" : ""; ?>><a href="/production/createpallet">Create pallet</a></li>
            </ul>
        <?php if ($search): ?>
            <form method="GET" class="navbar-search pull-left">
                <div class="input-prepend input-append">
                    <span class="add-on"><i class="icon-calendar"></i></span>
                    <input type="text" name="daterange" id="daterange" placeholder="Select date range" autocomplete="off" />
                    <input type="text" name="search" class="search-query span2" placeholder="Search">
                    <!-- <span class="add-on"><i class="icon-search"></i></span> -->
                    <button type="submit" class="btn" type="button">Search</button>
                </div>
            </form>
        <?php endif; ?>
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