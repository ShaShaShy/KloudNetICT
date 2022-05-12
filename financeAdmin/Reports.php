<?php
include 'mycon.php';
//QUERY FOR AUTOMATIC FROM UNPAID TO PENDING
// IF USER HAS NOT PAID ON-TIME
$result = mysqli_query($connection,"SELECT * FROM userbills");
$row = mysqli_fetch_array($result);

    if(strtotime((new DateTime())->format("Y-m-d")) > strtotime($row['ddate']) ){
    $newquery = "UPDATE userbills SET status = 'PENDING' WHERE hideNum = '0' AND status ='UNPAID'";
    $run2 = mysqli_query($connection,$newquery);
                    
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

    <title>Processing</title>

    <link rel="stylesheet" type="text/css" href="css/table.css">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
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
                    <span>Finance Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="dashboard"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Home</span>
                </a>

                 <a class="nav-link collapsed" href="billing"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Billing</span>
                </a>

                 <a class="nav-link collapsed" href="Reports"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Monthly Reports</span>
                </a>

                <a class="nav-link collapsed" data-toggle="modal" href="#" data-target="#logoutModal" 
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Logout</span>
                </a>
            </li>

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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
 
                        
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
            <a class="btn btn-primary " href="functions/all.php"  style=" margin: 5px; float: right;"><i class="fas fa-clipboard-check" style="font-size:20px"></i>&nbsp;&nbsp;Process All Payment</a> 

            <a class="btn btn-dark " href="functions/archiveAll.php"  style=" margin: 5px; float: right;"><i class="fas fa-archive" style="font-size:20px"></i>&nbsp;&nbsp;Archive All Paid Records</a>

            <a class="btn btn-dark " href="archives.php"  style=" margin: 5px; float: right;"><i class="fas fa-clipboard-list" style="font-size:20px"></i>&nbsp;&nbsp;View Archive List</a> 
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="color: black;">Monthly Payment Reports</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                        <!--Delete Confirmation Modal
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Deletion</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black;">Are you sure you want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">NO</button>
                    <a class="btn btn-primary" href="functions/delbill.php">YES</a>
                </div>
            </div>
        </div>
    </div>
        -->
    </div>
    
<form id="myForm" method="POST" action="functions/processSelect.php">

<input id="hide" type="submit" name="Paid" value="PROCESS SELECTED" class="btn btn-primary hidebtn" style="float:right;"><br><br>
    <?php
include 'mycon.php';

$result = mysqli_query($connection,"SELECT * FROM userbills ORDER BY ID DESC");


echo "<table class=\"table\" bgcolor=\"#ffffff\">
<thead class=\"thead-dark\">
<tr>
<th>Select</th>
<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Date Issued</th>
<th>Due Date</th>
<th>Monthly Bill</th>
<th>Other Fees</th>
<th>Charges</th>
<th>Total</th>
<th>Payment</th>
<th>Status</th>
<th></th>
<th></th>
<th></th>
    </tead>
</tr>";


while($row = mysqli_fetch_array($result))
  {


$total= $row['bill'] + $row['charges']; 
$id = $row['id'];

$sql="UPDATE userbills SET total='$total'  WHERE id = $id";
mysqli_query($connection,$sql);


$total= $row['bill'] - $row['charges']; 
$id = $row['id'];

$sql2="UPDATE userbills SET total='$total'  WHERE id = $id and fees = 'REBATES'";
mysqli_query($connection,$sql2);

    if($row['hideNum']!="1"){
  echo "<tr>";
  echo "<td><input class='checkbox[]' name='checkbox[]' type='checkbox' value='".$row['id']."' rel='facebox' onchange='valueChanged()'></td>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['tdate'] . "</td>";
  echo "<td>" . $row['ddate'] . "</td>";
  echo "<td>" . $row['bill'] . "</td>";
  echo "<td>" . $row['fees'] . "</td>";
  echo "<td>" . $row['charges'] . "</td>";
  echo "<td>" . $row['total'] . "</td>";
  echo "<td>" . $row['pmethod'] . "</td>";
  echo "<td>" . $row['status'] . "</td>";


  if($row['userpayment']==1){
  echo "<td><a rel='facebox' href='functions/bill_notProcessed.php?id=".$row['id']."&userpayment=0'><span class=\"btn btn-danger btn-xs glyphicon glyphicon-eye-open\">UNDO</span> </a> ";
    }else{
  echo "<td><a rel='facebox' href='functions/bill_processed.php?id=".$row['id']."&userpayment=1'><span class=\"btn btn-success btn-xs glyphicon glyphicon-eye-open\">PAID</span> </a> ";
    };

  echo "<td><a target='_blank' rel='facebox' href='printing.php?id=".$row['id']."'><span class=\"btn btn-info  btn-xs glyphicon glyphicon-eye-open\">PRINT</span></td>";
  echo "</td>";
  echo "<td><a rel='facebox' href='functions/delbill.php?id=".$row['id']."'><span class=\"btn btn-dark  btn-xs glyphicon glyphicon-eye-open\">ARCHIVE</span></td>";
  echo "</tr>";
  }
  };
echo "</table>";



?>

  </form>

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

    <div class="modal fade" id="archiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Done</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Done.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/search_bill.js"></script>
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
function checkBoxCheck(e) {
  if ($('input[name="checkbox[]"]:checked').length) {
    console.log("at least one checked");
    return true;
  } else {
    alert("Please select a User first!");
    return false;
  }
}

$('#myForm').on('submit', checkBoxCheck);    
    
</script>

</body>

</html>