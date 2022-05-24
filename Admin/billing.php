<?php

    require_once('../config.php'); 
    require_once('../logsession.php'); 
    if ($logged==false) {
         header("Location:../index.php");
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

    <title>Customer Billing</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/favicon1.png">
</head>

<body id="page-top" style="color: #000000">

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
            <li class="nav-item">
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

                <a class="nav-link collapsed" href="complaints"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-envelope-open"></i>
                    <span>Complaints</span>
                </a>

                <a class="nav-link collapsed" href="requests.php"
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


  

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
            <button class="btn btn-primary genallbtn" data-toggle="modal" style=" margin: 5px; float: right;"><i class="fas fa-money-check" style="font-size:20px"></i>&nbsp;&nbsp;Generate Bill for All</button> 
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800" style="color: black;">Billing</h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="color:black;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Client List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="myForm" method="POST" action="functions/GenSelected.php">
                                <input type="submit" name="Paid" id="Paid" value="GENERATE SELECTED" class="btn btn-primary " style=" margin-right: 5px; float: right; "><br><br>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: black;">
                                    <thead class="thead-dark">
                               <tr>  
                                    <th>Select</th>
                                    <th>Bill ID</th>
                                    <th>Full Name</th>  
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Registration Date</th>
                                     <th>Monthly Bill</th> 
                                     <th>Status</th>
                                     <th></th>

                               </tr>  
                                    </thead>

    <?php
include 'mycon.php';

$result = mysqli_query($connection,"SELECT * FROM user WHERE hideNum ='0' and status ='CONNECTED' ");


while($row = mysqli_fetch_array($result))
  {
                    echo "<tr>";
                    echo "<td><input class='checkbox[]' name='checkbox[]' id='toggle' type='checkbox' value='".$row['id']."' rel='facebox' onchange='valueChanged()'></td>";
                    echo '
                    <td>'.$row["id"].'</td>
                    <td>'.$row["firstName"].' '.$row["lastName"].' '.$row["middleName"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["addr"].' '.$row["munici"].' '.$row["prov"].'</td>
                    <td>'.$row["rdate"].'</td>
                    <td>'.$row["bill"].'</td>
                    <td>'.$row["status"].'</td>
                    <td>
                    <button type="button" class="btn btn-success genbtn"  data-toggle="modal" data-target="#billmodal"> GENERATE BILL </button>
                </td>';
                echo "</tr>";
  }


?>
                                      
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; KloudNet ICT Solutions 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <h5 class="modal-body">Bill for this month will be generated for all users!</h5>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="functions/GenAllPayment.php">Confirm</a>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="billmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Generate Client Bill</h5>
                </div>

                <form action="functions/userbill.php" method="POST">
                    <div class="modal-body">

                        <div class="form-group">

                            <input type="hidden" name="uid" id="id" value="id" readonly="readonly"  class="form-control"
                                >
                        </div>
                       
                        <div class="form-group">
                            <label> Full Name </label>
                            <input name="fname" id="firstName" value="firstName" readonly="readonly"  class="form-control"
                                >
                        </div>
                        
                        <div class="form-group">
                            <label> Email </label>
                            <input name="email" id="email" value="email" readonly="readonly" class="form-control"
                                >
                        </div>
                        
                        <div class="form-group">
                            <label> Address </label>
                            <input name="addr" id="addr" value="addr" readonly="readonly" class="form-control"
                                >
                        </div>

                        <div class="form-group">
                            <label>Date Issued</label>
                            <input value="<?php echo $CurrentDate = date("Y-m-d");?>"  name="tdate"  class="form-control"
                                >
                        </div>

                        <div class="form-group">
                            <label> Due Date</label>
                            <input value="<?php echo $CurrentDate = date("Y-m-d", strtotime($CurrentDate. '+ 30 days')); ?>" readonly="readonly" name="ddate" class="form-control"
                                >
                        </div>

                        <div class="form-group">
                            <label>Monthly Bills</label>
                            <input type="text" name="bill" id="bill" value="bill" class="form-control"
                                readonly="readonly">
                        </div>
                         <input type="hidden" name="status" value="Pending">

                        <select name="fees" style="padding: 1%; padding-right: 62%;">
                            <option>None</option>
                            <option value="INSTALLATION FEE">INSTALLATION FEE</option>
                            <option value="ADJUSTMENT">ADJUSTMENT</option>
                            <option value="OTHER CHARGES">OTHER CHARGES</option>
                            <option value="REBATES">REBATES</option>
                        </select><br><br>

                        <div class="form-group">
                            <label>	&#8369; Charges</label>
                            <input placeholder="&#8369;" type="text" name="charges" class="form-control" onkeypress="return onlyNumberKey(event)">
                        </div><br>

                         <input type="hidden" name="status" value="UNPAID">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertbill" class="btn btn-primary">Generate Bill</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="../js/search_bill.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

        <script>
        $(document).ready(function () {

            $('body').on('click','.genbtn', function (e) {

                $('#billmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[1]);
                $('#firstName').val(data[2]);
                $('#email').val(data[3]);
                $('#addr').val(data[4]);
                $('#bill').val(data[6]);

            });
        });
    </script>

        <script>
        $(document).ready(function () {

            $('.genallbtn').on('click', function () {

                $('#billallmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[1]);
                $('#firstName').val(data[2]);
                $('#email').val(data[3]);
                $('#addr').val(data[4]);
                $('#bill').val(data[6]);

            });
        });
    </script>


        <script>
        $(document).ready(function () {

            $('.addbtn').on('click', function () {

                $('#newbillmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#id').val(data[1]);
                $('#bill').val(data[2]);

            });
        });
    </script>
    
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>

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