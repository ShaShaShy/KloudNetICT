<?php

	$fullName = $_POST['fullName'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];

	$conn = new mysqli('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');
	if($conn->connect_error){
		die('Connection Failed: '.$conn->connect_error);
	}else{

		$stmt = $conn->prepare("insert into contactus(fullName,email,msg) values(?,?,?)");

		$stmt->bind_param("sss",$fullName,$email,$msg);
		$stmt->execute();
		
		echo "<script>
		alert('Your Message has been Sent!. please wait within 24 hours for our response!');
		window.location.href='../index.php';
		</script>";

		$stmt-> close();
		$conn->close();
	}

?>