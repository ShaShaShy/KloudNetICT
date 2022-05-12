<?php
$connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
$db = mysqli_select_db($connection, 'id18794570_kdb');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "UPDATE user SET hideNum ='1' WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);



    if($query_run)
    {
    $query1 = "UPDATE user SET STATUS ='DISCONNECTED' WHERE id='$id'";
    $query_run1 = mysqli_query($connection, $query1);
    header('location:../index.php');

    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>