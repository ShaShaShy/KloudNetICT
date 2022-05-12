<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $id = $_POST['id'];
    $query = "DELETE FROM user WHERE id=$id";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script>
        alert('User has been deleted from the Database!');
        window.location.href='../clientArchive.php';
        </script>";
    }
    else
    {
        echo "string";
    }

 ?>