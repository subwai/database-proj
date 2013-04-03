<?php
class Index implements iTwoColumnMaster {
    private $model;

    function __construct($model) {
        $this->model = $model;
    }

    function Head()
    { /*******************************************************/ ?>

        <link rel="stylesheet" type="text/css" href="/content/bootstrap/datepicker/daterangepicker.css" />

    <?php /*******************************************************/ }

    function Javascript()
    { /*******************************************************/ ?>

        <script type="text/javascript" src="/content/bootstrap/datepicker/date.js"></script>
        <script type="text/javascript" src="/content/bootstrap/datepicker/daterangepicker.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#daterange').daterangepicker({
                        ranges: {
                            'Today': ['today', 'today'],
                            'Yesterday': ['yesterday', 'yesterday'],
                            'Last 7 Days': [Date.today().add({ days: -6 }), 'today'],
                            'Last 30 Days': [Date.today().add({ days: -29 }), 'today'],
                            'This Month': [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth()],
                            'Last Month': [Date.today().moveToFirstDayOfMonth().add({ months: -1 }), Date.today().moveToFirstDayOfMonth().add({ days: -1 })]
                        }
                    },
                    function(start, end) {
                        $('#daterange').val(start.toString('yyyy/MM/dd') + ' - ' + end.toString('yyyy/MM/dd'));
                    }
                );
                $('#daterange').val('<?php echo $_GET["daterange"]; ?>');
                $('input[name="search"]').val('<?php echo $_GET["search"]; ?>');
        });
        </script>

    <?php /*******************************************************/ }

    function Header()
    { /*******************************************************/ ?>

    <?php 
        require "./views/production/header.php"; 
        loadHeader("index", true);        
    ?>

    <?php /*******************************************************/ }

    function CenterColumn()
    { /*******************************************************/ ?>
    
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cookie Type</th>
                    <th>Location</th>
                    <th>Customer</th>
                    <th>Order Id</th>
                    <th>Baking Date</th>
                    <th class="approved-th">Approved</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($this->model->pallets as $pallet): ?>
                <tr>
                    <td><?php echo $pallet->getBarcode(); ?></td>
                    <td><?php echo ucwords(strtolower($pallet->getCookieType())); ?></td>
                    <td><?php echo $pallet->getLocation(); ?></td>
                    <td><?php echo $pallet->getCustomer(); ?></td>
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
                            <a href="/production/editpallet/<?php echo $pallet->getBarcode(); ?>" class="btn"><i class="icon-pencil"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>

    <?php /*******************************************************/ }
}

?>