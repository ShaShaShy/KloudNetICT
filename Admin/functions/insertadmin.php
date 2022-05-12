<?php

if(isset($_POST['insertadmin']))
{

	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$status = 'admin';



    $conn = new mysqli('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');
    $result = mysqli_query($conn,"SELECT * FROM admin WHERE email = '$email' ");
	
	$count = mysqli_num_rows($result);
	if($count == 0 && strlen($_POST["pass"]) > 8 ){
	    
        $stmt = $conn->prepare("INSERT INTO `admin`(`email`,`pass`,`status`) VALUES(?,?,?)");

        $stmt->bind_param("sss",$email,$pass,$status);
        $stmt->execute();

		echo "<script>
		alert('New Admin Account Successfully Created!');
		window.location.href='../dashboard.php';
		</script>";
		

        $stmt-> close();
        $conn->close();	    
	
	}if (strlen($_POST["pass"]) <= 8) {
	    
	    echo "<script>
		alert('Password Must Contain At Least 8 Characters!');
		window.location.href='../dashboard.php';
		</script>";
		
	}if($count!=0){
	    include 'config.php';
	    
		echo "<script>
		alert('The email you have entered already exist!!');
		window.location.href='../dashboard.php';
		</script>";

	}
}

?>