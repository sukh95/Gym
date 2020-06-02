<?php
require '../../include/db_conn.php';
header('Content-Type: application/json');

//$conn = mysqli_connect("localhost","root","test","phpsamples");

$sqlQuery = "SELECT uid as UserID,(select username from users where users.userid=health_status.uid) As username , calorie,height,weight,fat FROM health_status ORDER BY UserID";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>