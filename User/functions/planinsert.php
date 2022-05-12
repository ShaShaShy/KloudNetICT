<?php

if(isset($_POST['insertplan']))
{
    $planName = $_POST['planName'];
    $cost = $_POST['cost'];
    $descrip = $_POST['descrip'];


    $conn = new mysqli('localhost','root','','kdb');

    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{

        $stmt = $conn->prepare("insert into plans(planName,cost,descrip) values(?,?,?)");

        $stmt->bind_param("sis",$planName,$cost,$descrip);
        $stmt->execute();

        echo "<script>
        alert('New ISP plans Has been Added!');
        window.location.href='../subscriptions.php';
        </script>";

        $stmt-> close();
        $conn->close();
    }
}
?>