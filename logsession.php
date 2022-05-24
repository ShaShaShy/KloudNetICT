<?php  
    $connection = new mysqli('localhost','id18794570_mydb','byU=^D})=1YGb/IG','id18794570_kdb');
    session_start();
    $logged = false;
    //checking who logged in the admin or the user
    if(isset($_SESSION['logged']))
    {
        if ($_SESSION['logged'] == true)
        {
            $logged = true ;
            $email = $_SESSION['email'];
        }
    }
    else
        $logged=false;

    if($logged != true)
    {
        $email = "";
        if (isset($_POST['email']) && isset($_POST['pass']))
        {
            $email=$_POST['email'];
            $password=$_POST['pass'];            
            
            //user LOG-IN checking
            $sql = "SELECT * FROM user WHERE email='$email' AND pw='$password' ";

            $result = mysqli_query($connection,$sql);
            $count = mysqli_num_rows($result);
            
            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['user'] = $row['email'];
                $_SESSION['logged']=true;
                $_SESSION['uid']=$row['id'];
                $_SESSION['email'] = $email;
                $_SESSION['account']="user";
                header("Location:/User/index");
            }    
            //admin LOG-IN checking
            $sql = "SELECT * FROM admin WHERE email='$email' AND pass='$password' ";

            $result = mysqli_query($connection,$sql);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['logged']=true;
                $_SESSION['email'] = $email;
                $_SESSION['aid']=$row['id'];
                $_SESSION['account']="admin";
                header("Location:/Admin/dashboard");
            }

            // Finance Administrator Checking.
            $sql = "SELECT * FROM financeadmin WHERE email='$email' AND pass='$password' ";

            $result = mysqli_query($connection,$sql);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['logged']=true;
                $_SESSION['email'] = $email;
                $_SESSION['aid']=$row['id'];
                $_SESSION['account']="financeadmin";
                header("Location:/financeAdmin/dashboard");
            }
            else{
        echo "<script>
        alert('Invalid Email and Password!!');
        window.location.href='index';
        </script>";
            }


        }
    }
?>