<?php

if(isset($_POST['insertbill']))
{
    $bill = $_POST['bill'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $tdate = $_POST['tdate'];
    $status = $_POST['status'];
    $ddate = $_POST['ddate'];
    $subplan = $_POST['subplan'];


    $conn = new mysqli('localhost','root','','kdb');

    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{

        $stmt = $conn->prepare("insert into userbills(bill,fname,lname,email,tdate,status,ddate,uid,subplan) values(?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("issssssis",$bill,$fname,$lname,$email,$tdate,$status,$ddate,$uid,$subplan);
        $stmt->execute();

        echo "<script>
        alert('Bill Succesfully Generated.');
        window.location.href='../billing.php';
        </script>";

        $stmt-> close();
        $conn->close();
    }
}
?>