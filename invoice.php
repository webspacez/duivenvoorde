<?php include('inc/header.php');?>
<div class="container-fluid">
<br>

<br>

<div class="card">
<div class="card-body">
    <h3>Juice House Clients</h3>   
    
  
<table class="table" id="clients">
<thead>
        <tr>
            <th>Company Name</th>
            <th>Company Address</th>
            <th>City</th>
            <th>Country</th>
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
          <td><?=$row['Address_City'];?></td><td> <?=$row['Address_Country'];?></td>
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
      $('.invoice').addClass('active');
    });
</script>

<?php include ('inc/footer.php');?>
