<?php

if(isset($_POST['insertcomplaint']))
{
    $fname = $_POST['fname'];
    $uid = $_POST['uid'];
    $descrip = $_POST['descrip'];
    $complaint = $_POST['complaint'];
    $status = $_POST['status'];
    $pnum = $_POST['pnum'];
    $addr = $_POST['addr'];


    $conn = new mysqli('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');

    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{

        $stmt = $conn->prepare("insert into urequest(fname,uid,descrip,complaint,status,pnum,addr) values(?,?,?,?,?,?,?)");

        $stmt->bind_param("sisssis",$fname,$uid,$descrip,$complaint,$status,$pnum,$addr);
        $stmt->execute();
        

        echo "<script>
        alert('Request has been sent please wait and it will be processed within 24 hours.');
        window.location.href='../index.php';
        </script>";

        $stmt-> close();
        $conn->close();
    }
}
?>