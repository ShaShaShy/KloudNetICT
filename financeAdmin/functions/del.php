<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'kdb');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM USER WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo "<script>
        alert('Data Succesfully Deleted!');
        window.location.href='../index.php';
        </script>";
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>