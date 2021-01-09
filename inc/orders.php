<?php include('inc/header.php');?>
<div class="container-fluid">
<br>

<br>

<div class="card">
<div class="card-body">
    <h3>Juice House Inbound PO</h3>   
    
  
<table class="table" id="example">
<thead>
        <tr>
            <th>Document Number</th>
            <th>product number</th>
            <th>product name</th>
            <th>weight </th>
            <th>packs</th>
            <th>pack type</th>
            <th>number on pallet</th>
            <th>picker</th>
        </tr>
    </thead>
  <?php

  $sql ="SELECT
  Products.Product_Description,
  Pack_Structure.Pack_Name,
  Pack_Structure.Weight,
  Products.Qty_per_Pallet,
  Document_Header.Stamp_User,
  Document_Lines.Status_Code,
  Pack_Structure.Pack_Quantity,
  Products.Product_No,
  Document_Lines.Batch,
  Document_Header.Document_No,
  Document_Header.Document_Type
FROM
  dbo.Document_Header
  INNER JOIN dbo.Document_Lines ON Document_Header.Document_ID = Document_Lines.Document_ID
  INNER JOIN dbo.Products ON Document_Lines.Storer_ID = Products.Partner_ID 
  AND Document_Lines.Product_No = Products.Product_No
  INNER JOIN dbo.Pack_Structure ON Products.Product_No = Pack_Structure.Article_No 
  AND Products.Partner_ID = Pack_Structure.Partner_ID 
ORDER BY
  Document_Header.Stamp_Date DESC";

$stmt = sqlsrv_query( $connLive, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
      <tr>
          <td><?=$row['Document_Header.Document_No'];?></td><td> <?=$row['Products.Product_No'];?></td>
          <td><?=$row['Products.Product_Description'];?></td><td> <?=$row['Pack_Structure.Weight'];?><?//=$row['Requested_Date']->format('d-m-Y');?></td>
          <td><?=$row['Pack_Structure.Pack_Quantity'];?></td><td><?=$row['Pack_Structure.Pack_Name'];?></td>
           <td><?=$row['Products.Qty_per_Pallet'];?></td><td><?=$row['Document_Header.Stamp_User'];?></td>
        </tr>
      <?php }

sqlsrv_free_stmt( $stmt);

?>
</table>



<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pageLength": 15,
         responsive: true
    } );
} );

</script>

</div>
</div>
</div>

<script type="text/javascript">
    $(function() {
      $('.orders').addClass('active');
    });
</script>


<?php include ('inc/footer.php');?>




