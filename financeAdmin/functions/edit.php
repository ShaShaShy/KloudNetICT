<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'kdb');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['id'];
        
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $pw = $_POST['pw'];
        $number = $_POST['number'];
        $addr = $_POST['addr'];
        $bill = $_POST['bill'];

        $query = "UPDATE USER SET firstName='$firstName',email='$email',pw='$pw', number='$number',addr='$addr',bill='$bill' WHERE id='$id'";
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