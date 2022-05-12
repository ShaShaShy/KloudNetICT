<?php
  $delete = $_POST['checkbox'];
    if(isset($_POST['checkbox']))
{
    foreach($_POST['checkbox'] as $val)
    {
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $query = "UPDATE userbills SET STATUS = 'PAID' WHERE id = $val";

    $query_run = mysqli_query($connection,$query);

    $query2 = "UPDATE userbills SET userPayment = '1' WHERE id = $val";

    $query_run2 = mysqli_query($connection,$query2);
    header('location:../process.php');
    }
}else{
    header('location:../process.php');
    echo "error";
}

?>