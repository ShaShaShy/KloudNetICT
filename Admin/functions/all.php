<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $query = "UPDATE userbills SET status = 'PAID'";

    $query2 = "UPDATE userbills SET userpayment='1'";

    $query_run = mysqli_query($connection,$query);

    $query_run = mysqli_query($connection,$query2);

    if($query_run)
    {
        echo "<script>
        alert('All of the Payment has been Processed!');
        window.location.href='../process.php';
        </script>";
    }
    else
    {
        echo "Unknown Error!";
    }

 ?>