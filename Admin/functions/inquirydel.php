<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $id = $_GET['id'];
    $query = "DELETE FROM contactus WHERE id=$id";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script>
        alert('Data has been deleted!');
        window.location.href='../dashboard';
        </script>";
    }
    else
    {
        echo "Error please try again!";
    }

 ?>