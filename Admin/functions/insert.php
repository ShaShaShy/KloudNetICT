<?php

if(isset($_POST['insertdata']))
{
	$firstname = $_POST['firstname'];
	$middleName = $_POST['middleName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$pw = $_POST['pw'];
	$addr = $_POST['addr'];
	$municipality = $_POST['municipality'];
	$province = $_POST['province'];
	$number = $_POST['number'];
	$dropdown = $_POST['drop'];
	$bill = $_POST['bill'];
	$status = $_POST['status'];
	$hidenum = $_POST['hidenum'];
    $rdate = date("d");

    $conn = new mysqli('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');
    $result = mysqli_query($conn,"SELECT * FROM user WHERE email = '$email' ");
	
	$count = mysqli_num_rows($result);
	if($count == 0 && strlen($_POST["pw"]) > 8 ){
	    
        $stmt = $conn->prepare("INSERT INTO `user`(`firstName`,`lastName`,`middleName`,`email`,`pw`,`addr`,`munici`,`prov`,`number`,`dropdown`,`bill`,`status`,`hideNum`,`rdate`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("ssssssssisisis",$firstname,$middleName,$lastName,$email,$pw,$addr,$municipality,$province,$number,$dropdown,$bill,$status,$hidenum,$rdate);
        $stmt->execute();

		echo "<script>
		alert('User Successfully Added!');
		window.location.href='../index.php';
		</script>";
		

        $stmt-> close();
        $conn->close();	    
	
	}if (strlen($_POST["pw"]) <= 8) {
	    
	    echo "<script>
		alert('Client Password Must Contain At Least 8 Characters!');
		window.location.href='../index.php';
		</script>";
		
	}if($count!=0){
	    include 'config.php';
	    
		echo "<script>
		alert('The email you have entered already exist!!');
		window.location.href='../index.php';
		</script>";

	}
}

?>