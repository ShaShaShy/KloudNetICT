<?php

if(isset($_POST['insertbill']))
{
    $bill = $_POST['bill'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $tdate = $_POST['tdate'];
    $status = $_POST['status'];
    $ddate = $_POST['ddate'];
    $fees = $_POST['fees'];
    $charges = $_POST['charges'];
    $total = '0';
    $pmethod = '';
    $userpayment = '';
    $hidenum = '';

    $conn = mysqli_connect('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');

    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{

        $stmt = $conn->prepare("insert into userbills(bill,fname,email,tdate,status,ddate,uid,fees,charges,total,pmethod,userpayment,hideNum) values(?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("isssssisiisii",$bill,$fname,$email,$tdate,$status,$ddate,$uid,$fees,$charges,$total,$pmethod,$userpayment,$hidenum);
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