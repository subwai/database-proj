<?php
class Index implements iTwoColumnMaster {
    private $model;

    function __construct($model) {
        $this->model = $model;
    }

    function LeftColumn()
    { /*******************************************************/ ?>

        <ul class="nav nav-list sidenav">
          <li class="active"><a href="#"><i class="icon-chevron-right"></i> Dropdowns</a></li>
          <li><a href="#"><i class="icon-chevron-right"></i> Button groups</a></li>
          <li><a href="#"><i class="icon-chevron-right"></i> Button dropdowns</a></li>
        </ul>

    <?php /*******************************************************/ }

    function RightColumn()
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
                  <td rowspan="2">1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@TwBootstrap</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
</table>

    <?php /*******************************************************/ }
}

?>