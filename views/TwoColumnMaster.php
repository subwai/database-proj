<?php

class TwoColumnMaster {
    public function __construct($model, $view) {
/* ==================================================== */ ?>

<!doctype html>
<html>
<head>
    <title>Krusty Kookies AB | <?php echo $_GET["view"]; ?></title>
    <link rel="stylesheet" href="/content/css/main.css">
    <link rel="stylesheet" href="/content/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="span12 title">Krusty Kookies AB</div>
        <div class="row">
            <div class="span3">
                <?php $view->LeftColumn(); ?>
            </div>
            <div class="span9">
                <?php $view->RightColumn(); ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php /* ============================================== */ }
}

?>