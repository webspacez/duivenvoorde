<?php 
include('inc/header.php');
$id = $_GET['id'];

?>
<div class="container-fluid">
<br>

<br>

<div class="card">
<div class="card-body">
    <h3>Duivenvoorde Client Stock Overview</h3>   
    
  
<table class="table" id="client-stock">
<thead>
        <tr>
            <th>Company</th>
            <th>Pallet ID</th>
            <th>Product Name</th>
            <th>Product Number</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
    </thead>
  <?php

$sql = "SELECT
  Goods_Items.Batch, 
  Goods_Items.Item_ID, 
  Goods_Items.Product_No, 
  Goods_Items.Quantity, 
  Goods_Items.Stamp_Date, 
  Goods_Items.Stamp_Time, 
  Address.Product_Group, 
  Products.Product_Description
FROM
  dbo.Goods_Items
  INNER JOIN
  dbo.Address
  ON 
    Goods_Items.Storer_ID = Address.Address_ID
  INNER JOIN
  dbo.Products
  ON 
    Goods_Items.Storer_ID = Products.Partner_ID AND
    Goods_Items.Product_No = Products.Product_No
WHERE
  Goods_Items.Storer_ID =  $id";

  //echo $sql;

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while($row = sqlsrv_fetch_array($stmt)) {?>
  <tr>
          <td><?=$row['Product_Group']; ?></td><td> <?=$row['Batch'];?></td><td> <?=$row['Product_Description'];?></td>
          <td><?=$row['Product_No'];?></td><td> <?=$row['Quantity'];?></td><td><?=$row['Stamp_Date'];?></td>
        </tr>

      <?php }

sqlsrv_free_stmt( $stmt);

?>
</table>



<script type="text/javascript">
$('#client-stock').dataTable( {
  "pageLength": 15
} );
</script>

</div>
</div>
</div>

<script type="text/javascript">
    $(function() {
      $('.clients').addClass('active');
    });
</script>

<?php include ('inc/footer.php');?>