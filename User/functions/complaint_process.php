<?php 
    
    $connection = mysqli_connect("localhost","root","","kdb");
    $id = $_GET['id'];
    $query = "UPDATE COMPLAINTS SET status = 'Processed' WHERE id=$id";

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