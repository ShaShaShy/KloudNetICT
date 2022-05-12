<?php
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG");
    $db = mysqli_select_db($connection, 'id18794570_kdb');
    $result = mysqli_query($connection,"SELECT * FROM user WHERE hideNum ='0' ");

    while ($row = mysqli_fetch_array($result))
    {
    
    $bill = $row['bill'];
    $fname = $row['firstName'];
    $email = $row['email'];
    $uid = $row['id'];

    $tdate = date("Y-m-d");
    $status = 'UNPAID';
    $ddate = date("Y-m-d", strtotime($tdate. '+ 30 days'));
    $fees = 'None';

    
    $conn = new mysqli('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');

    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{
 
        $stmt = $conn->prepare("insert into userbills(bill,fname,email,tdate,status,ddate,uid,fees) values(?,?,?,?,?,?,?,?)");

        $stmt->bind_param("isssssis",$bill,$fname,$email,$tdate,$status,$ddate,$uid,$fees);
        $stmt->execute();
    

        echo "<script>
        alert('Bill Succesfully Generated.');
        window.location.href='../billing.php';
        </script>";

    
    }
    };
?>