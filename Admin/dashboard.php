<?php

    require_once('../config.php'); 
    require_once('../logsession.php'); 
    if ($logged==false) {
         header("Location:../index.php");
    }
    
    
    
 if (!$connection) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT * FROM plans";
         $result = mysqli_query($connection,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $status[]  = $row['planName']  ;
            $total[] = $row['cost'];
        }
 
 
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KloudNet</title>

    <link rel="stylesheet" type="text/css" href="css/table.css">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" type="image/x-icon" href="../images/favicon1.png">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KloudNet<br><sup>ICT Solutions</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>ADMIN</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="index"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fas fa-users"></i>
                    <span>Client </span>
                </a>
                 <a class="nav-link collapsed" href="billing"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Billing</span>
                </a>

                 <a class="nav-link collapsed" href="process"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Reports</span>
                </a>

                 <a class="nav-link collapsed" href="Subscriptions"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Subscription Plans</span>
                </a>

                <a class="nav-link collapsed" href="complaints.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-envelope-open"></i>
                    <span>Complaints</span>
                </a>

                <a class="nav-link collapsed" href="requests"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Fibr Upgrade/Cut Request</span>
                </a>

                <a class="nav-link collapsed" data-toggle="modal" href="#" data-target="#logoutModal" 
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Logout</span>
                </a>

            </li>




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">

                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>





                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
            <button class="btn btn-primary " data-toggle="modal" data-target="#adminModal"  style=" margin: 5px; float: right;"><i class="fas fas fa-users" style="font-size:20px"></i>&nbsp;&nbsp;Create Admin Account</button>  
            <a class="btn btn-primary genallbtn" href="#"  style=" margin: 5px; float: right;"><i class="fas fa-money-check" style="font-size:20px"></i>&nbsp;&nbsp;Customer Inquiries</a>  

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h1 mb-0 text-gray-800" style="color: black;">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                <a href="index.php" style="text-decoration:none;">Total Number of Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php

    require 'mycon.php';
    $query = "SELECT id FROM user WHERE status = 'CONNECTED' ORDER BY id";
    $run = mysqli_query($connection,$query);

    $row = mysqli_num_rows($run);
    echo '<h3>'.$row.'</h3>';

    ?></div>
                                        </div></a>
                                        <div class="col-auto">
                                            <i class="fas fa-emoji-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                <a href="archives.php" style="text-decoration:none;">Total Earnings</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
<?php

    require 'mycon.php';
    $query = "SELECT sum( total ) AS sum FROM `userbills` WHERE status ='PAID'";
    $run = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($run)){

        $output = '<h4>'.$row{'sum'}.'</h4>';
        echo $output;
    }

    ?>
                                            </div>
                                        </div></a>
                                        
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="archives.php" style="text-decoration:none;">Paid Bills</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php

$sql = "SELECT * FROM userbills WHERE status ='PAID'";
                $query = $con->query($sql);

                echo "$query->num_rows";

?>
                                            </div>
                                        </div></a>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="complaints.php" style="text-decoration:none;">Processed Complaints</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
<?php


$sql = "SELECT * FROM complaints WHERE status ='PROCESSED'";
                $query = $con->query($sql);

                echo "$query->num_rows";

?> 
                                            </div>
                                        </div></a>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                <a class="text-xs font-weight-bold text-danger" href="process.php" style="text-decoration:none;">Unpaid Bills</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php

$sql = "SELECT * FROM userbills WHERE status ='UNPAID'";
                $query = $con->query($sql);

                echo "$query->num_rows";

?>
                                            </div>
                                        </div></a>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                <a class="text-xs font-weight-bold text-danger" href="complaints.php" style="text-decoration:none;">Unprocessed Complaints</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php


$sql = "SELECT * FROM complaints WHERE status ='Pending'";
                $query = $con->query($sql);

                echo "$query->num_rows";

?> 

                                            </div>
                                        </div></a>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                <a class="text-xs font-weight-bold text-danger" href="requests.php" style="text-decoration:none;">Requests for Upgrade/Disconnection</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php


$sql = "SELECT * FROM urequest WHERE status ='Pending'";
                $query = $con->query($sql);

                echo "$query->num_rows";

?> 

                                            </div>
                                        </div></a>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            
                        </div>



        </div><br><br><br>


                </div>
                
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!--Generate bill for all users-->
    <div class="modal fade" id="billallmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document" style="margin-top:3%;">
            <div class="modal-content">

                   <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Customer Service Inquiry</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: black;">
                                    <thead>
                               <tr>  
                                    <th>Full Name</th>
                                    <th>Email</th>    
                                    <th>Message</th>  
                                    <th></th> 
                                    <th></th>
                               </tr>  
                                    </thead>
    <?php
include 'mycon.php';

$result = mysqli_query($connection,"SELECT * FROM contactus ");



  
while($row = mysqli_fetch_array($result))
  {

  echo "<tr>";
  echo "<td style='white-space:nowrap;'>" . $row['fullName'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['msg'] . "</td>";
  echo "<td><a target = '_blank'; href='https://mail.google.com/'; class='btn btn-dark deletebtn'> Reply </a></td>";
  echo "<td><a rel='facebox' class=\"btn btn-danger\" href='functions/inquirydel.php?id=".$row['id']."'><span class=\"  btn-xs glyphicon glyphicon-eye-open\">DELETE</span></td>";
  echo "</tr>";
  };
echo "</table>";


?>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                

                <!-- /.container-fluid -->

            </div>
        </div>
    </div>
    
       <!-- <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Client Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form action="functions/inquirydel.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h5>Are you sure you want to delete this data?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> YES</button>
                    </div>
                </form>

            </div>
        </div>
    </div>-->

<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Create Admin Account</h5>
                </div>

                <form action="functions/insertadmin.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label>Admin Email</label>
                            <input type="text" name="email" id="email" class="form-control" required="required" placeholder="Enter Email">
                        </div><br>

                        <div class="form-group">
                            <label> Password </label>
                            <input type="text" name="pass" id="password" onkeypress="return onlyNumberKey(event)" class="form-control" required="required" placeholder="Enter atleast 9 characters">
                        </div><br>
                        
                        <div class="form-group">
                            <label> Confirm Password </label>
                            <input type="text" name="number" id="confirm_password" onkeypress="return onlyNumberKey(event)" class="form-control" required="required" placeholder="Confirm Password">
                        </div><br>
                    
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertadmin" class="btn btn-primary">ADD USER</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

        <script>
        $(document).ready(function () {

            $('.genallbtn').on('click', function () {

                $('#billallmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);


            });
        });
    </script>



<script>
    
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;    
</script>


        <!--<script>
        $(document).ready(function () {

            $('body').on('click','.deletebtn', function (e) {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('td');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>-->

</body>


</html>