<?php
    $delete = $_POST['checkbox'];
    
    foreach($_POST['checkbox'] as $val)
    {
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $query = "UPDATE user SET hideNum = '1' WHERE id = $val";

    $query_run = mysqli_query($connection,$query);

    $query1 = "UPDATE user SET STATUS ='DISCONNECTED' WHERE id=$val";
    $query_run1 = mysqli_query($connection, $query1);

    header('location:../index.php');
    }
    
?>