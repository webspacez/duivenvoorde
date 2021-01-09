<?php include('inc/header.php');?>
<div class="container-fluid">
<br>

<br>

<div class="card">
<div class="card-body">
    <h3>Duivenvoorde Clients</h3>   
    
  
<table class="table" id="clients">
<thead>
        <tr>
            <th>Company Name</th>
            <th>Address</th>
            <th>Postcode</th>
            <th>City</th>
            <th>Country</th>
            <th>Tel</th>
            <th>Email</th>
        </tr>
    </thead>
  <?php

$sql = "SELECT * FROM dbo.Address ORDER BY Address.Product_Group ASC";
$stmt = sqlsrv_query( $conn, $sql );

if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
      <tr>
          <td><a href="client-stock.php?id=<?=$row['Address_ID'];?>"><?=$row['Product_Group'];?></a></td><td> <?=$row['Address_Line_1'];?></td>
          <td><?=$row['Addrees_Zip_Code'];?></td><td><?=$row['Address_City'];?></td><td> <?=$row['Address_Country'];?></td><td> <?=$row['Telephone'];?></td><td> <a href="<?=$row['Email'];?>"><?=$row['Email'];?></a></td>
        </tr>
      <?php }

sqlsrv_free_stmt( $stmt);

?>
</table>



<script type="text/javascript">
$('#client').dataTable( {
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
