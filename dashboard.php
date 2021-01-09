<?php include("inc/header.php");?>

<div class="container-fluid">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <!-- <h1 class="h2">Dashboard</h1> -->
            <div class="btn-toolbar mb-2 mb-md-0">
              <!-- <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button> -->
            </div>
          </div>

          <div class="row">
          <div class="col-md-6">
          <div class="card">
            <div class="card-body">
            <h4>Inbound Stock</h4>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Batch</th>
                  <th>Customer</th>
                  <th>Product No</th>
                  <th>Location</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                      $sql = "SELECT
      Products.Product_Description, 
      Goods_Items.Quantity, 
      Goods_Items.Batch, 
      Goods_Items.Expiration_Date, 
      Goods_Items.Location_ID, 
      Goods_Items.Pallet_ID, 
      Goods_Items.Product_No, 
      Goods_Items.Pack_Key, 
      Goods_Items.Case_Status, 
      Address.Product_Group, 
      Goods_Items.Stamp_Date
    FROM
      dbo.Goods_Items
      INNER JOIN
      dbo.Products
      ON 
        Goods_Items.Storer_ID = Products.Partner_ID AND
        Goods_Items.Product_No = Products.Product_No
      INNER JOIN
      dbo.Address
      ON 
        Goods_Items.Storer_ID = Address.Address_ID
    WHERE
      Case_Status NOT IN ('CARC')
      AND Location_ID = 'INBOUND' ORDER BY Stamp_Date ASC OFFSET 7 ROWS FETCH NEXT 7 ROWS ONLY";

    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
      <tr>
                    <tr>
                      <td> <?=$row['Batch'];?></td>
                      <td><?=$row['Product_Group'];?></td>
                      <td><?=$row['Product_No'];?></td>
                      <td><?=$row['Location_ID'];?></td>                    
<!--                       <td> <?=$row['Stamp_Date']->format('d-m-Y');?></td> -->
                      <td><?=$row['Case_Status'];?></td>
                      </tr>
                    <?php }

              sqlsrv_free_stmt( $stmt);

              ?>
                
              </tbody>
            </table>

            <a href="stock.php"><button type="button" class="btn btn-primary">All Stock</button></a>
          </div>
            </div>
          </div>
            </div>

            <div class="col-md-6">
          <div class="card">
            <div class="card-body">
               <h4>Received Stock</h4>
            <!-- <canvas class="my-4" id="myChart" width="900" height="380"></canvas> -->
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Batch</th>
                  <th>Customer</th>
                  <th>Product No</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                      $sql = "SELECT
      Products.Product_Description, 
      Goods_Items.Quantity, 
      Goods_Items.Batch, 
      Goods_Items.Expiration_Date, 
      Goods_Items.Location_ID, 
      Goods_Items.Pallet_ID, 
      Goods_Items.Product_No, 
      Goods_Items.Pack_Key, 
      Goods_Items.Case_Status, 
      Address.Product_Group, 
      Goods_Items.Stamp_Date
    FROM
      dbo.Goods_Items
      INNER JOIN
      dbo.Products
      ON 
        Goods_Items.Storer_ID = Products.Partner_ID AND
        Goods_Items.Product_No = Products.Product_No
      INNER JOIN
      dbo.Address
      ON 
        Goods_Items.Storer_ID = Address.Address_ID
    WHERE
      Case_Status NOT IN ('CARC')
      AND Case_Status = 'CRCV' ORDER BY Stamp_Date ASC OFFSET 7 ROWS FETCH NEXT 7 ROWS ONLY";

    $stmt = sqlsrv_query( $conn, $sql );
    if( $stmt === false) {
        die( print_r( sqlsrv_errors(), true) );
    }

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
      <tr>
                    <tr>
                      <td> <?=$row['Batch'];?></td>
                      <td><?=$row['Product_Group'];?></td>
                      <td><?=$row['Product_No'];?></td>
                     <!--  <td><?=$row['Location_ID'];?></td>  -->                   
                       <td> <?=$row['Stamp_Date']->format('d-m-Y');?></td>
                      <td><?=$row['Case_Status'];?></td>
                      </tr>
                    <?php }

              sqlsrv_free_stmt( $stmt);

              ?>
                
              </tbody>
            </table>
            <a href="stock.php"><button type="button" class="btn btn-primary">All Stock</button></a>
            </div>
          </div>
            </div>
          </div>

          <br>


          <div class="row">
            <div class="col-md-3">
              <div class="card">
                <div class="card-body">
                <span class="badge badge-info" style="float: left; margin-right: 10px;">
                <i class="fas fa-box-open" style="font-size: 48px; margin: 6px; margin-right: 10px;"></i></span>
                <b>Purchase Orders</b><br>
               <small><b>3</b> Today | <b>14</b> This week</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <span class="badge badge-info" style="float: left; margin-right: 10px;">
                <i class="fas fa-dolly-flatbed" style="font-size: 48px; margin: 6px; margin-right: 10px;"></i></span>
                <b>Inventory</b><br>
               <small>3 Today | 14 This week</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <span class="badge badge-info" style="float: left; margin-right: 10px;">
                <i class="fas fa-truck" style="font-size: 48px; margin: 6px; margin-right: 10px;"></i></span>
                <b>Orders to Ship</b><br>
               <small><b>3</b> Orders</small>
                </div>
              </div>
            </div>
            <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                <span class="badge badge-info" style="float: left; margin-right: 10px;">
                <i class="fas fa-exclamation-triangle" style="font-size: 48px; margin: 6px; margin-right: 10px;"></i></span>
                <b>Overdue Shipments</b><br>
               <small>3 Today | 14 This week</small>
                </div>
              </div>
            </div>
          </div>

          <br>

          <div class="card">
            <div class="card-body">

          <h2>Purchase Orders</h2>
<table class="table" id="example">
<thead>
        <tr>
            <th>Product_Group</th>
            <th>Document_ID</th>
            <th>Document_No</th>
            <th>Requested Date</th>
            <th>Process</th>
            <th>Document_Type_Description</th>
        </tr>
    </thead>
  <?php

      $sql = "SELECT
      Order_Types.Document_Type_Description, 
      Order_Types.Process, 
      Document_Header.Requested_Date, 
      Document_Header.Document_ID, 
      Document_Header.Document_No, 
      Address.Product_Group
      FROM
      dbo.Document_Header
      INNER JOIN
      dbo.Order_Types
      ON 
         Document_Header.Document_Type = Order_Types.Document_Type
      INNER JOIN
      dbo.Address
      ON 
         Document_Header.Storer_ID = Address.Address_ID
      WHERE
      Document_Header.Document_Type = 30
      ORDER BY Requested_Date
      OFFSET 0 ROWS
FETCH NEXT 10 ROWS ONLY";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
      <tr>
          <td><?=$row['Product_Group'];?></td><td> <?=$row['Document_ID'];?></td>
          <td><?=$row['Document_No'];?></td><td> <?=$row['Requested_Date']->format('d-m-Y');?></td>
          <td><?=$row['Process'];?></td><td><?=$row['Document_Type_Description'];?></td>
        </tr>
      <?php }

sqlsrv_free_stmt( $stmt);

?>
</table>
            </div>
          </div>

          <br/><br/>

</div>

          <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>

<script type="text/javascript">
    $(function() {
      $('.dashboard').addClass('active');
    });
</script>

<?php include("inc/footer.php");?>