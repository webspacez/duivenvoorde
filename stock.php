<?php include('inc/header.php');?>
<div class="container-fluid">
<br>

<br>

<div class="card">
<div class="card-body">
    <h3>Duivenvoorde Stock</h3>   
    
<table class="table" id="stock">
<thead>
        <tr>
          <th>Client</th>
           <th>Pallet</th>
            <th>Case ID</th>
            <th>Product #</th>
            <th>Product Name</th>
            <th>Quantity</th>            
            <th>Location</th>
        </tr>
    </thead>
  <?php

      $sql = "SELECT 
  Goods_Items.Product_No, 
  Goods_Items.Location_ID, 
  Goods_Items.Quantity, 
  Goods_Items.Pallet_ID, 
  Goods_Items.Pack_Key, 
  Goods_Items.Pack_Level, 
  Goods_Items.Case_ID, 
  Goods_Items.Item_Type, 
  Goods_Items.Batch, 
  Products.Product_Description, 
  Address.Product_Group, 
  Goods_Items.Case_Status, 
  Goods_Items.Expiration_Date
FROM
  dbo.Goods_Items
  INNER JOIN
  dbo.Products
  ON 
    Goods_Items.Product_No = Products.Product_No
  INNER JOIN
  dbo.Address
  ON 
    Goods_Items.Storer_ID = Address.Address_ID
WHERE
  Goods_Items.Case_Status = ''
--   ORDER BY 1
-- OFFSET 0 ROWS
-- FETCH NEXT 100 ROWS ONLY
";

$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
      <tr>
        <td><?=$row['Product_Group'];?></td>
        <td> <?=$row['Batch'];?></td>
        <td> <?=$row['Case_ID'];?></td>
<!--         <td> <?=$row['Item_Type'];?></td>
        <td></td> -->
        <td><?=$row['Product_No'];?></td>
        <td><?=$row['Product_Description'];?></td>
        <td><?=$row['Quantity'];?></td>  
        <td><?=$row['Location_ID'];?></td>
        </tr>
      <?php }

sqlsrv_free_stmt( $stmt);

?>
</table>

<br/><br/>


<script type="text/javascript">
$(document).ready(function() {
    $('#stock').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pageLength": 15,
         responsive: true,

    } );
} );

</script>

</div>
</div>
</div>

<script type="text/javascript">
    $(function() {
      $('.stock').addClass('active');
    });
</script>


<?php include ('inc/footer.php');?>