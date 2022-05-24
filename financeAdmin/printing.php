<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/billing_print.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" type="image/jpg" href="images/favi.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
	<title>Printing of Bills</title>
</head>


<body style="font-family:'Poppins',sans-serif">

	<div class="container">

		<div class="row">
			<div class="col-md-12">
					<img src="img/logo.png">
				<div class="row">
                    <br><br>
                    <hr>
				<p><i class='fas fa-map-marker-alt' style='font-size:20px'></i>  FL Pena, Kabasalan Zamboanga Sibugay</p>
                <p><i class='fas fa-phone-square' style='font-size:20px'></i>  09269908478</p>
                <p><i class='fas fa-user-circle' style='font-size:20px'></i>  kloudnetict@gmail.com</p>
                <p><i class='fas fa-money-check' style='font-size:20px'></i>  Metro bank#: 099-309-937-2029, Gcash #:0926-990-8478</p>

				</div>
				<hr>
				<?php
                include 'mycon.php';
                
                 $id = $_GET['id'];
                $result = mysqli_query($connection,"SELECT * FROM userbills WHERE ID = '$id'");
                $test = mysqli_fetch_array($result);
                
                $id=$test['id'] ;
                $fname=$test['fname'] ;
                $email=$test['email'] ;
                $tdate=$test['tdate'] ;
                $ddate=$test['ddate'] ;

                $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG");
                $db = mysqli_select_db($connection, 'id18794570_kdb');

             	$id = $_GET['id'];
                
                $query = "SELECT * FROM userbills WHERE id='$id'";
                $query_run = mysqli_query($connection, $query);
            ?>

                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {

                    $total= $row['bill'] + $row['charges']; 
                    $id = $row['id'];

                    $sql="UPDATE userbills SET total='$total'  WHERE id = $id";
                    mysqli_query($connection,$sql);
            ?>
                                <p><strong> Bill Reference Number: <?php echo $row['id']; ?> </strong></p>
                                <p> Name: <?php echo strtoupper($row['fname']); ?></p>
                                <p> Date: <?php echo $row['tdate']; ?> </p>
                                <p> Due Date: <?php echo $row['ddate']; ?> </p>
                                <p> Monthly Bill: <?php echo $row['bill']; ?></p>
                                <p>Charges: <?php echo $row['fees']; ?> <?php echo  $row['charges']; ?>  </p>
                                <p>Total payment: <?php echo $row['total']; ?></p>
                                <p>Status: <?php echo $row['status']; ?></p>
        

                                
                        
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>

			</div>

		</div>
        <br><br><br><br>
		    <p ><?php echo strtoupper($row['fname']); ?></p>
		 <p style="text-decoration-line: overline;">Signature over printed name</p><br><br>
		 
		 <p style="text-decoration-line: overline;">Authorized Signature</p>

	</div>



</body>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script>
    window.print();
</script>
</html>