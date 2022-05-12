<?php

if(isset($_POST['insertdata']))
{
	$planreq = $_POST['planreq'];
	$firstName = $_POST['firstName'];
	$ucon = $_POST['ucon'];
	$addr = $_POST['addr'];
	$tdate = $_POST['tdate'];
	$status = $_POST['status'];

	$conn = new mysqli('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');
	if($conn->connect_error){
		die('Connection Failed: '.$conn->connect_error);
	}else{

		$stmt = $conn->prepare("insert into planrequest(planreq,firstName,ucon,addr,tdate,status) values(?,?,?,?,?,?)");

		$stmt->bind_param("ssisss",$planreq,$firstName,$ucon,$addr,$tdate,$status);
		$stmt->execute();
		
		echo "<script>
		alert('Plan Request has been sent!');
		window.location.href='../index.php';
		</script>";

		$stmt-> close();
		$conn->close();
	}
}
?>