<?php
$connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");
$db = mysqli_select_db($connection, 'id18794570_kdb');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['id'];
        
        $email = $_POST['email'];
        $number = $_POST['number'];
        $bill = $_POST['bill'];
        $status = $_POST['status'];
        $dropdown = $_POST['dropdown'];

        $query = "UPDATE user SET email='$email', number='$number',bill='$bill',status='$status',dropdown='$dropdown' WHERE id='$id'";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
        echo "<script>
        alert('User Data has been Updated!');
        window.location.href='../index.php';
        </script>";
        }
        else
        {
        echo "<script>
        alert('Data not Updated!');
        window.location.href='../index.php';
        </script>";
        }
    }
?>