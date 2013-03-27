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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/content/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="row header">
        <div class="container">
            <div class="span12 title">Krusty Kookies AB</div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="span12">
                <?php $view->Header(); ?>
                <?php $view->CenterColumn(); ?>
            </div>
            <!--<div class="span3">
                <?php $view->LeftColumn(); ?>
            </div>
            <div class="span9">
                <?php $view->RightColumn(); ?>
            </div>-->
        </div>
    </div>
</body>
</html>

<?php /* ============================================== */ }
}

?>