<?php
$connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
$db = mysqli_select_db($connection, 'id18794570_kdb');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM plans WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo "<script>
        alert('Data Succesfully Deleted!');
        window.location.href='../Subscriptions.php';
        </script>";
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>