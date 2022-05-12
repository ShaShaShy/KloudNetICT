<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $query = "UPDATE userbills SET hideNum = '1' WHERE status = 'PAID'";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script>
        alert('Data has been removed from the table!');
        window.location.href='../Reports.php';
        </script>";
    }
    else
    {
       header('location:../Reports.php');
    }

 ?>