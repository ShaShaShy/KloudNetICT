<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $id = $_GET['id'];
    $query = "UPDATE user SET hideNum = '0' WHERE id=$id";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script>
        alert('Data has been restored!');
        window.location.href='../clientArchive.php';
        </script>";
    }
    else
    {
        echo "string";
    }

 ?>