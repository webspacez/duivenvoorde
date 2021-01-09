<?php
$serverName = "51.136.51.43,1433\SQLEXPRESS";
$connectionInfo = array( "Database"=>"JuiceHouseTEST", "UID"=>"Magic", "PWD"=>"Magic123");
$connTest = sqlsrv_connect($serverName, $connectionInfo);
// if( $conn ) {
//      echo "Connection established.<br />";
// }else{
//      echo "Connection could not be established.<br />";
//      die( print_r( sqlsrv_errors(), true));
// }

// $serverName = "52.169.114.154,1433\SQLEXPRESS";
// $connectionInfo = array( "Database"=>"JuiceHouse", "UID"=>"Magic", "PWD"=>"Magic123");
// $connLive = sqlsrv_connect($serverName, $connectionInfo);


$serverName = "51.136.51.43,1433\SQLEXPRESS";
$connectionInfo = array( "Database"=>"DuivenvoordeTEST", "UID"=>"Magic", "PWD"=>"Magic123");
$conn = sqlsrv_connect($serverName, $connectionInfo);

if( $conn ) {
     //echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>