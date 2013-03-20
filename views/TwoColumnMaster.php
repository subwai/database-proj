<?php

class TwoColumnMaster {
    public function __construct($model, $view) {
/* ==================================================== */ ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="revisit-after" content="10 days">
    <title>Krusty Kookies AB | <?php echo $_GET["view"]; ?></title>
    <link rel="stylesheet" type="text/css" href="/content/css/main.css" />
</head>

<body>

<div id="wrapper">
    <div id="left_column">
        <?php $view->LeftColumn(); ?>
    </div>
    <div id="right_column">
        <?php $view->RightColumn(); ?>
    </div>
</div>

</body>
</html>

<?php /* ============================================== */ }
}

?>