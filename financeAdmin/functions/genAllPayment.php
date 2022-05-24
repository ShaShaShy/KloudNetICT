<?php
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $db = mysqli_select_db($connection, 'id18794570_kdb');
    
    $result = mysqli_query($connection,"SELECT * FROM user WHERE hideNum ='0' AND status ='CONNECTED' ");

    while ($row = mysqli_fetch_array($result))
    {
    
    $bill = $row['bill'];
    $fname = $row["firstName"].' '.$row["lastName"].' '.$row["middleName"];
    $email = $row['email'];
    $uid = $row['id'];

    $tdate = date("Y-m-d");
    $status = 'UNPAID';
    $ddate = date("Y-m-d", strtotime($tdate. '+ 30 days'));
    $fees = 'None';
    $charges = '0';
    $total = '0';
    $pmethod = '';
    $userpayment = '';
    $hidenum = '';

    
    $conn = new mysqli('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{
 
        $stmt = $conn->prepare("insert into userbills(bill,fname,email,tdate,status,ddate,uid,fees,charges,total,pmethod,userpayment,hideNum) values(?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("isssssisiisii",$bill,$fname,$email,$tdate,$status,$ddate,$uid,$fees,$charges,$total,$pmethod,$userpayment,$hidenum);
        $stmt->execute();
    
        echo mysqli_error($conn);
        echo "<script>
        alert('Bill Succesfully Generated.');
        window.location.href='../billing.php';
        </script>";

    
    }
    };
?>