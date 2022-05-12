<?php
require_once('../config.php'); 
require_once('../logsession.php'); 
if ($logged==false) {
         header("Location:../index.php");
}

                $connection = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG");
                $db = mysqli_select_db($connection, 'id18794570_kdb');

                $id = $_SESSION['uid'];
                
                $query = "SELECT * FROM userbills WHERE uid ={$id}";
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

    <title>Billing</title>

    
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/mytable.css">
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
            <a target="_blank" class="btn btn-primary " href="printing.php"  style=" margin: 5px; float: right;">Print My Bills</a> 
   
                        

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="color: black;">My Bills</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

             <table class="table" >
  <thead class="thead-dark" style="white-space:nowrap;">
                            <tr>
                        <th>ID</th>
                        <th >Full Name</th>
                        <th>Email</th>
                        <th >Date Issued</th>
                        <th>Due Date</th>
                        <th >Monthly Bill</th>
                        <th >Other Fees</th>
                        <th>Charges</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                            </tr>
  </thead>
  <tbody >
  <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody style="color:black;">
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['fname']; ?> </td>
                                <td> <?php echo $row['email']; ?> </td>
                                <td> <?php echo $row['tdate']; ?> </td>
                                <td> <?php echo $row['ddate']; ?> </td>
                                <td> <?php echo $row['bill']; ?> </td>
                                <td> <?php echo $row['fees']; ?> </td>
                                <td> <?php echo $row['charges']; ?> </td>
                                <td> <?php echo $row['total']; ?> </td>
                                <td> <?php echo $row['pmethod']; ?> </td>
                                <td> <?php echo $row['status']; ?> </td>
                                <?php
                                if($row['pmethod']!='GCASH' AND $row['pmethod']!='MANUAL COLLECTION' AND $row['pmethod']!='BANK TRANSFER' ){
                                echo "<td><button type='button' class='btn btn-success genbtn'> Payment</button></td>";
                                    }
                                ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
  </tbody>
 </table>

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

    <div class="modal fade" id="billmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please choose a payment Method</h5>
                </div>

                <form action="functions/u-send.php" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id" value="id">

                        <select name="pmethod"  style="padding: 1%; padding-right: 58%;">
                            <option value="BANK TRANSFER">BANK TRANSFER</option>
                            <option value="GCASH">GCASH</option>
                            <option value="MANUAL COLLECTION">MANUAL COLLECTION</option>
                        </select><br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertbill" class="btn btn-primary">Add Payment Method</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>

    <script type="text/javascript" src="../js/nav.js"></script>
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

            $('.genbtn').on('click', function () {

                $('#billmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[0]);
                $('#firstName').val(data[1]);
                $('#lastName').val(data[2]);
                $('#email').val(data[3]);
                $('#number').val(data[4]);
                $('#addr').val(data[5]);
                $('#dropdown').val(data[6]);
                $('#pmethod').val(data[7]);
                $('#bill').val(data[8]);


            });
        });
    </script>

</body>

</html>