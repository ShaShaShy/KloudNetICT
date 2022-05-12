<?php

if(isset($_POST['insertdata']))
{

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$addr = $_POST['addr'];
	$number = $_POST['number'];
	$pw = $_POST['pw'];
	$dropdown = $_POST['dropdown'];

	$conn = new mysqli('localhost','root','','kdb');
	if($conn->connect_error){
		die('Connection Failed: '.$conn->connect_error);
	}else{

		$stmt = $conn->prepare("insert into user(firstName,lastName,email,addr,number,pw,dropdown) values(?,?,?,?,?,?,?)");

		$stmt->bind_param("ssssiss",$firstName,$lastName,$email,$addr,$number,$pw,$dropdown);
		$stmt->execute();
		
		echo "<script>
		alert('User has been added!');
		window.location.href='../index.php';
		</script>";

		$stmt-> close();
		$conn->close();
	}
}
?>