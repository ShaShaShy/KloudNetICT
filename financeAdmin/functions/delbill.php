<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $id = $_GET['id'];
    $query = "UPDATE userbills SET hideNum = '1' WHERE id=$id";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script>
        alert('Data has been sent to Archived!');
        window.location.href='../Reports.php';
        </script>";
    }
    else
    {
        echo "string";
    }

 ?>