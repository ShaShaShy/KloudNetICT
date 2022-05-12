<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $id = $_GET['id'];
    $query = "UPDATE complaints SET status = 'PROCESSED' WHERE id=$id";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script>
        alert('Client Complaint has been Processed!');
        window.location.href='../complaints.php';
        </script>";
    }
    else
    {
        echo "string";
    }

 ?>