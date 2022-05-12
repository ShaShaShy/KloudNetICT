<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $id = $_GET['id'];
    $payment = $_GET['userpayment'];
    $query = "UPDATE userbills SET userpayment=$payment  WHERE id=$id";

    $query_run = mysqli_query($connection,$query);

    $query2 = "UPDATE userbills SET STATUS = 'PAID' WHERE id=$id";
    $query_run = mysqli_query($connection,$query2);
                    

    header('location:../Reports.php');

 ?>