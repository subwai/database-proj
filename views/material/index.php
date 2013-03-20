<?php
class Index implements iTwoColumnMaster {
    private $model;

    function __construct($model) {
        $this->model = $model;
    }

    function LeftColumn()
    { /*******************************************************/ ?>

        

    <?php /*******************************************************/ }

    function RightColumn()
    { /*******************************************************/ ?>
    
    	<?php foreach ($this->model as $key => $cookie): ?>
    		<p><?php echo $cookie->getType(); ?></p>
    	<?php endforeach ?>

    <?php /*******************************************************/ }
}

?>