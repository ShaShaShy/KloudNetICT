<?php
require_once('../config.php'); 
require_once('../logsession.php'); 
if ($logged==false) {
         header("Location:../index.php");
}

                $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG");
                $db = mysqli_select_db($connection, 'id18794570_kdb');

                $id = $_SESSION['uid'];
                
                $query = "SELECT * FROM complaints WHERE uid ={$id}";
                $query_run = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Complaints</title>

    <link rel="stylesheet" type="text/css" href="css/table.css">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/mycomplaints.css" rel="stylesheet">

</head>

<body id="page-top">

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
                
                <a class="nav-link collapsed" href="myrequests"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-envelope-open"></i>
                    <span>My Request</span>
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
                 <button class="btn btn-primary userbtn" data-toggle="modal" >Create New Complaint</button>    
                 <br><br>

                        

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="color: black;">My Complaints</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

    <table class="table" >
        <thead class="thead-dark" style="white-space:nowrap;">
                            <tr>
                                <th scope="col">Referrence Number</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Address</th>
                                <th scope="col">Complaint</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>


                            </tr>
  </thead>
  <tbody >
                        


  <?php
                $count = mysqli_num_rows($query_run);
                if($count == 0)
                {
                     
                }
                else 
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody style="color:black;">
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['fname']; ?> </td>
                                <td> <?php echo $row['pnum']; ?> </td>
                                <td> <?php echo $row['addr']; ?> </td>
                                <td> <?php echo $row['complaint']; ?> </td>
                                <td> <?php echo $row['descrip']; ?> </td>
                                <td> <?php echo $row['status']; ?> </td>
                                </td>
                            </tr>
                        </tbody>
                        <?php           
                    }
                    
                }
            ?>
  </tbody>
 </table>

      <div class="modal fade" id="useraddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="color:black;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Complaint Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>



                <form action="insertcomplaint.php" method="POST" >
                    <div class="modal-body">

                        
                        <div class="form-group">
                            <input type="hidden" name="uid" value="<?php echo $id;?>" readonly="readonly"  class="form-control"
                                >
                        </div>

                            <select name = "complaint" id="drop" style="padding: 1%; padding-right: 40%;" required = "required">
                            <option value = "Slow Internet Connection" selected>Slow Internet Connection</option>
                            <option value = "Router is not Working">Router is not Working</option>
                            <option value = "Router is working but no Internet">Router is working but no Internet</option>
                            <option value = "Fibr Cut">Fibr Cut </option>
                            </select><br><br>

                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fname" id="fname" class="form-control"
                                required = "required" placeholder="Enter Full Name">
                        </div><br>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="descrip" id="descrip" class="form-control"
                                required = "required" placeholder="Enter Description"></textarea>
                        </div><br>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="pnum" id="number" class="form-control"
                                maxlength="11" required = "required" placeholder="Enter Contact Number"> 
                        </div><br>

                        <div class="form-group">
                            <label> Address </label>
                            <input type="text" name="addr" id="addr" class="form-control"
                                required = "required" placeholder="Enter Adress">
                        </div><br>
                    </div>

                    <input type="hidden" name="status" value="Pending">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertcomplaint" class="btn btn-primary">Send Complaint</button>
                    </div>

                </form>

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
        aria-hidden="true" style="color:black;">
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

</body>

</html>