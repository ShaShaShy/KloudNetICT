<?php

    require_once('../config.php'); 
    require_once('../logsession.php'); 
    if ($logged==false) {
         header("Location:../index.php");
    }
$connection = new mysqli('localhost', 'id18794570_mydb', 'byU=^D})=1YGb/IG', 'id18794570_kdb') or die(mysqli_error());

  $id = $_SESSION['uid'];
$result = mysqli_query($connection,"SELECT * FROM userbills WHERE uid = '$id'");
$test = mysqli_fetch_array($result);

if($test != null){    
$id=$test['id'] ;
$fname=$test['fname'] ;
$email=$test['email'] ;
$tdate=$test['tdate'] ;
$ddate=$test['ddate'] ;
}else{
   
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

    <title>My Dashboard</title>

    <link rel="stylesheet" type="text/css" href="css/table.css">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body id="page-top" style="color:black;">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KloudNet<br><sup>ICT Solutions</sup></div>
            </a>



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
                    <i class="fas fa-poll-h"></i>
                    <span>Home</span>
                </a>
                 <a class="nav-link collapsed" href="customerdash"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-money-check-alt"></i>
                    <span>My Bills</span>
                </a>

                <a class="nav-link collapsed" href="mycomplaints"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-envelope-open"></i>
                    <span>My Complaints</span>
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" >

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto" style="color:black;">
                                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="modal" data-target="#myModal" aria-expanded="false" style="color:black;">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" >						
                                <?php 
						if($test != null){
						    echo strtoupper($fname);
						}else{
						    echo "Account in Process";
						}
						
						?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg" >
                            </a>
                        </li>
    
                        

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="color: black;">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm userbtn" data-target="#useraddmodal">Request Plan Upgrade/Disconnection</a>
                    </div>




                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Current Fibr Plan</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                
<?php

$connection = new mysqli('localhost', 'id18794570_mydb', 'byU=^D})=1YGb/IG', 'id18794570_kdb') or die(mysqli_error());

$id = $_SESSION['uid'];
$result = mysqli_query($connection,"SELECT * FROM user WHERE ID = '$id'");
$test = mysqli_fetch_array($result);


$plan=$test['dropdown'];
echo $plan

?>

                                            </div>
                                        </div>
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
                                                Paid Bills</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php

$id = $_SESSION['uid'];

$sql = "SELECT * FROM userbills WHERE uid ={$id} AND status='PAID'";
$query = $con->query($sql);

                echo "$query->num_rows";

?> 
                                            </div>
                                        </div>
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
                                                Unpaid Bills</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php

$id = $_SESSION['uid'];

$sql = "SELECT * FROM userbills WHERE uid ={$id} AND status='UNPAID'";
$query = $con->query($sql);

                echo "$query->num_rows";

?> 

                                            </div>
                                        </div>
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
                                                Processed Complaints</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php

$id = $_SESSION['uid'];

$sql = "SELECT * FROM complaints WHERE uid ={$id} AND status='PROCESSED'";
$query = $con->query($sql);

                echo "$query->num_rows";

?> 

                                            </div>
                                        </div>
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
                                                Unprocessed Complaints</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

<?php

$id = $_SESSION['uid'];

$sql = "SELECT * FROM complaints WHERE uid ={$id} AND status='Pending'";
$query = $con->query($sql);

                echo "$query->num_rows";

?> 

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<!--Plan Upgrade Modal-->
<div class="modal fade" id="useraddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Plan Configuration Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form action="functions/insertreq.php" method="POST">
                    <div class="modal-body">

                            <select name = "planreq" style="padding: 1%; padding-right: 50%;">
                            <option value = "Plan Upgrade">Request Plan Upgrade</option>
                            <option value = "Disconnection">Request Disconnection</option>
                            </select><br><br>

                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="firstName" id="fname" class="form-control"
                                required = "required">
                        </div><br>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="ucon" id="number" class="form-control"
                                required = "required">
                        </div><br>

                        <div class="form-group">
                            <label> Address </label>
                            <input type="text" name="addr" id="number" class="form-control"
                                required = "required">
                        </div><br>

                    <input type="hidden" name="status" value="Pending">
                    <input type="hidden" name="tdate" value="<?php echo $CurrentDate = date("F d Y");?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Send Request</button>
                    </div>

                </form>

            </div>
        </div>
    </div>


    </div>
    <!-- prof modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="color:black;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="text-align:center;" class="modal-title" id="exampleModalLabel">My Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form action="functions/insertreq.php" method="POST" style="color:black; text-align:center;">
                    <div class="modal-body">

                        <div class="form-group" >
                            <label>Name:&nbsp;</label> 
                                <?php 
						if($test != null && isset($fname)){
						    echo strtoupper($fname);
						}else{
						    echo "Account Currently in Process";
						}
						
						?>
                        </div>

                        <div class="form-group">
                            <label>My Email:&nbsp;</label> 
                                <?php 
						if($test != null){
						    echo strtoupper($email);
						}else{
						    echo "No Record Found";
						}
						
						?>
                        </div><br>




                </form>

            </div>
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

            $('.userbtn').on('click', function () {

                $('#useraddmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);

            });
        });
    </script>
    
        <script>
        $(document).ready(function () {

            $('.userbtns').on('click', function () {

                $('#myModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);

            });
        });
    </script>
 

</body>

</html>