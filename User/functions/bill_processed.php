<?php 
    
    $connection = mysqli_connect("localhost","root","","kdb");
    $id = $_GET['id'];
    $query = "UPDATE USERBILLS SET status = 'PROCESSED' WHERE id=$id";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script>
        alert('Bill Processed!');
        window.location.href='../process.php';
        </script>";
    }
    else
    {
        echo "string";
    }

 ?>