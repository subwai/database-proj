<?php

class TwoColumnMaster {
    public function __construct($model, $view) {
/* ==================================================== */ ?>

<!doctype html>
<html>
<head>
    <title>Krusty Kookies AB | <?php echo $_GET["view"]; ?></title>
    <link rel="stylesheet" href="/content/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/content/bootstrap/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/content/css/main.css">
    <?php $view->Head(); ?>
</head>
<body>
    <div class="row header">
        <div class="container">
            <div class="span12 title">
                <a href="/">
                    <span>Krusty</span>
                    <span>Kookies</span>
                    <span>AB</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="span12">
                <?php $view->Header(); ?>
                <?php $view->CenterColumn(); ?>
            </div>
        </div>
    </div>

    <!-- Javascript on bottom for quick load -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/content/bootstrap/js/bootstrap.min.js"></script>
    <?php $view->Javascript(); ?>
</body>
</html>

<?php /* ============================================== */ }
}

?>