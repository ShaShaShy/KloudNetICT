<?php
$connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG");
$db = mysqli_select_db($connection, 'id18794570_kdb');

    if(isset($_POST['insertbill']))
    {   
        $id = $_POST['id'];
        
        $pmethod = $_POST['pmethod'];

        $query = "UPDATE userbills SET pmethod='$pmethod' WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);
        header('location:../customerdash.php');



    }
?>