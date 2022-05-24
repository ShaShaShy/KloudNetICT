<?php 
    
    $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
    $id = $_GET['id'];
    $plan = $_POST['dropdown'];
    $query = "UPDATE user SET dropdown = $plan WHERE id=$id";

    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        echo "<script>
        alert('Data has been Processed!');
        window.location.href='../requests.php';
        </script>";
    }
    else
    {
        echo "string";
    }

 ?>