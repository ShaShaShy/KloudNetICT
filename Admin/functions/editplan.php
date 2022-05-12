<?php
$connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
$db = mysqli_select_db($connection, 'id18794570_kdb');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['id'];
        
        $planName = $_POST['planName'];
        $cost = $_POST['cost'];
        $descrip = $_POST['descrip'];

        $query = "UPDATE plans SET planName='$planName',cost='$cost',descrip='$descrip' WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
        echo "<script>
        alert('User Data has been Updated!');
        window.location.href='../Subscriptions.php';
        </script>";
        }
        else
        {
        echo "<script>
        alert('Data not Updated!');
        window.location.href='../Subscriptions.php';
        </script>";
        }
    }
?>