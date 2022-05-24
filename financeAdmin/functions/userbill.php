<?php

    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $db = mysqli_select_db($connection, 'id18794570_kdb');
    
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
        
    $result = mysqli_query($connection,"SELECT * FROM userbills WHERE fname = '$fname' AND tdate = '$tdate' ");

    $count = mysqli_num_rows($result);
    $tdatez = date("Y-m-d");
    
    $conn = mysqli_connect('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');
    
    if($count != 0){

        echo "<script>
        alert('Bill for this user is already Generated for this month!');
        window.location.href='../billing.php';
        </script>";        
        
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
    
    
?>