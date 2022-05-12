<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");

    $id = $_POST['id'];

    $query = "DELETE FROM complaints WHERE id = $id";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script>
        alert('Complaint has been deleted!');
        window.location.href='../complaints.php';
        </script>";
    }
    else
    {
        echo "Error please try again!";
    }

 ?>