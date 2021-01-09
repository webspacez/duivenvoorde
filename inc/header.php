<?php session_start(); /* Starts the session */
if(!isset($_SESSION['UserData']['Username'])){
header("location:index.php");
exit;
}
?>

<?php include ('inc/connect.php');?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></link>
  <link rel="stylesheet" href="css/fontawsome.all.min.css"></link>
  
  
  <link src="js/dataTables.bootstrap4.min.css"></link>
  <link rel="stylesheet" type="text/css" href="css/dataTables.min.css" /></link>

  <link src=" https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></link>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap4.js"></script>
<script type="text/javascript" src="js/pdfmake.min.js"></script>
<script type="text/javascript" src="js/csv-table.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: url('img/login-background.png');">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="dashboard.php">Duivenvoorde<!-- <img src="img/jh-logo.jpg"> --></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dashboard">
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item stock">
        <a class="nav-link" href="stock.php">Stock</a>
      </li>
      
<!--       <li class="nav-item reports">
        <a class="nav-link" href="reports.php">Reports</a>
      </li> -->
      <li class="nav-item clients">
        <a class="nav-link" href="clients.php">Clients</a>
      </li>

<!--       <li class="nav-item client-stock">
        <a class="nav-link" href="invoice.php">Invoice</a>
      </li>  -->
<!--       <li class="nav-item received">
        <a class="nav-link" href="received.php">Received</a>
      </li>
      <li class="nav-item put-away">
        <a class="nav-link" href="put-away.php">Put Away</a>
      </li>-->
<!--       <li class="nav-item checklist">
        <a class="nav-link" href="checklist.php">Checklist</a>
      </li> 

      <li class="nav-item search">
        <a class="nav-link" href="search.php">Lot Number</a>
      </li>

      <li class="nav-item fotos">
        <a class="nav-link" href="photos.php">Photos</a>
      </li>

    </ul>
    <ul  class="navbar-nav">
    <li class="nav-item ">
        <a class="nav-link" href="logout.php">Logout</a>
      </li> -->
    </ul>

  </div>
</nav>