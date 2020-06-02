<?php
require '../../include/db_conn.php';
$memberid = $_POST['memberid'];
$rating= $_POST['rating'];

$query1  = "select * from rating where  memberid = $memberid";
$result1 = mysqli_query($con, $query1);
if (mysqli_affected_rows($con) == 1) {
	
	$query="update rating set rating='".$rating."' where memberid = '".$memberid."'";
	if(mysqli_query($con,$query))
	{
		echo json_encode(array("abc"=>'successfuly registered'));
	}

	
}
else
{
	
	$query="insert into rating(memberid,rating) values ('".$memberid."','".$rating."')";

	if(mysqli_query($con,$query))
	{
		echo json_encode(array("abc"=>'successfuly registered'));
	}
	else
	{
		echo json_encode(array("abc"=>'successfuly registered problem'.$con -> error ."$memberid"));
	}
}
									


?>