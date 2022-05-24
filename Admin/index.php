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

    <title>Client List</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet" type="text/css">
    <link href="css/billing_print.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/x-icon" href="../images/favicon1.png">
</head>

<body id="page-top" style="color: #000000">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KloudNet<br><sup>ICT Solutions</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
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
                <a class="nav-link collapsed" href="index.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fas fa-users"></i>
                    <span>Client </span>
                </a>
                 <a class="nav-link collapsed" href="billing.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Billing</span>
                </a>

                 <a class="nav-link collapsed" href="process.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Reports</span>
                </a>

                 <a class="nav-link collapsed" href="Subscriptions.php"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Subscription Plans</span>
                </a>

                <a class="nav-link collapsed" href="complaints.php"
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


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

  



                        <div class="topbar-divider d-none d-sm-block"></div>
                        <button class="btn btn-primary userbtn" data-toggle="modal" style=" margin-right:5px;  float: right;"><i class="fas fa-user-plus" style="font-size:15px"></i>&nbsp;&nbsp;Add User</button>&nbsp;&nbsp;
              <a class="btn btn-dark " href="clientArchive.php"  style=" float: right;"><i class="fas fa-users" style="font-size:20px"></i>&nbsp;&nbsp;Client Archive</a>


                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-dark">Client List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form id="myForm" method="POST" action="functions/clientArcSelected.php">
                                <input type="submit" name="Paid" id="Paid" value="ARCHIVE SELECTED" class="btn btn-dark hidebtn" style=" margin-right: 5px; float: right; "><br><br>

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color: black;">
                                    <thead class="thead-dark">
                               <tr>  
                                    <th>Select</th>
                                    <th>ID</th>
                                    <th>Full Name</th>  
                                    <th>Email</th>  
                                    <th>Contact</th>  
                                    <th>Barangay/Municipality/Province</th>
                                    <th>Registration Date</th>  
                                    <th>Plan</th> 
                                     <th>Bill</th> 
                                     <th>Status</th>
                                     <th></th>
                                     <th></th>

                               </tr>  
                                    </thead>
        <tbody id="userData">
        <?php

        ?>       
            <?php           
            $result = mysqli_query($connection,"SELECT * FROM user GROUP BY ID DESC");   
            if(!empty($result)) {
                foreach($result as $order) {
                    if($order['hideNum']!="1"){
                    echo "<tr>";
                    echo "<td><input class='checkbox[]' name='checkbox[]' id='toggle' type='checkbox' value='".$order['id']."' rel='facebox' onchange='valueChanged()'></td>";
                    echo '                    
                    <td>'.$order["id"].'</td>       
                    <td style="white-space:nowrap;">'.$order["firstName"].' '.$order["middleName"].' '.$order["lastName"].'</td>
                    <td>'.$order["email"].'</td>
                    <td>'.$order["number"].'</td>
                    <td>'.$order["addr"].' '.$order["munici"].' '.$order["prov"].'</td>
                    <td>'.$order["rdate"].'</td>
                    <td>'.$order["dropdown"].'</td>
                    <td style="white-space:nowrap;">'.$order["bill"].'</td>
                    <td>'.$order["status"].'</td>
                    <td>
                    <button type="button" class="btn btn-success editbtn"> EDIT </button>
                </td>
                <td>
                    <button type="button" class="btn btn-dark deletebtn"> ARCHIVE </button>
                </td>
                    ';
                    echo "</tr>";
                }
                }
            } else {
            ?>            
                <tr><td colspan="3">No user(s) found...</td></tr>
            <?php } ?>
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
    
    
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Client Data </h5>
                </div>

                <form action="functions/edit.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                >
                        </div><br>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="number" id="number" onkeypress="return onlyNumberKey(event)" class="form-control"
                                >
                        </div><br>

                        <div class="form-group">
                            <label> Plan </label>
                            <input type="text" name="dropdown" id="dropdown" class="form-control"
                                >
                        </div><br>

                        <div class="form-group">
                            <label> Monthly Bill </label>
                            <input type="text" name="bill" id="bill" onkeypress="return onlyNumberKey(event)" class="form-control"
                                >
                        </div><br>


                        <select name="status" id="status" required="required">
                            <option value="CONNECTED">CONNECTED</option>
                            <option value="DISCONNECTED">DISCONNECTED</option>
                            <option value="REJECTED">REJECT USER</option>
                        </select>

                    
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Client Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form action="functions/del.php" method="POST">

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
    </div>

    <div class="modal fade" id="useraddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Client </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form action="functions/insert.php" method="POST">
                    <div class="modal-body">

                        

                        <div class="form-group">
                            <label> First Name </label>
                            <input type="text" name="firstname" class="form-control"
                                required="required" placeholder="Enter First Name">
                        </div><br>
                        
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastName" type="text"  class="form-control"
                                required="required" placeholder="Enter Last Name">
                        </div><br>
                        
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input name="middleName" type="text"  class="form-control"
                                required="required" placeholder="Enter Middle Name">
                        </div><br>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"
                                required="required" placeholder="Enter Email">
                        </div><br>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="number" class="form-control" onkeypress="return onlyNumberKey(event)" maxlength="11"
                                required="required" placeholder="Enter Contact Number">
                        </div><br>

                        <div class="form-group">
                            <label> Password </label>
                            <input type="password" id="password" name="pw" class="form-control"
                                required="required" placeholder="Enter Password">
                        </div><br>
                        
                        <div class="form-group">
                            <label> Confirm Password </label>
                            <input type="password" id="confirm_password" class="form-control"
                                required="required" placeholder="Confirm Password">
                        </div><br>
                        
    <label style="color:black;">Barangay</label>
  <select name="addr" id="address" class="address"  onchange="javascript:selectChangedadd();" style="font-weight:bold; font-size: 15px;" required="required">
    <?php
        $link = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");

        if(!$link)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $records = mysqli_query($link, "SELECT * FROM address");
        echo "<option selected disabled value=''>-Select Address-</option>";
        while($obj = $records->fetch_object())
        {
           
           echo '<option data-price1="'.$obj->municipality.'" data-price2="'.$obj->province.'" value="'.$obj->barangay.'">'.$obj->barangay.'</option>';
        }
    ?>  
    </select><br><br>
    
            <label>Municipality</label>
            <input name="municipality" id="data-price1"  type="text"  class="form-control" required="required" readonly>
            <br>
                        
            
            <label>Province</label>
            <input name="province" id="data-price2"  type="text"  class="form-control" required="required" readonly>
            <br>

  <select name="drop" id="drop" class="product" onchange="javascript:selectChanged();" style="font-weight:bold; font-size: 15px; " required="required">

    <?php
        $link = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");

        if(!$link)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $records = mysqli_query($link, "SELECT * FROM plans");
        echo "<option selected disabled value=''>-Select Fibr Plan-</option>";
        while($obj = $records->fetch_object())
        {
           echo '<option data-price="'.$obj->cost.'" value="'.$obj->planName.'">'.$obj->planName.'</option>';
        }
    ?>  

  <input type="hidden" id="data-price" type="text" name="bill" />
  
  <input type="hidden" name="status" value="DISCONNECTED">
  <input type="hidden" name="hidenum" value="0">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Add User</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

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
    
      <script type="text/javascript">
    function selectChanged () 
        { 
        var obj = document.getElementById("drop");
        var courseTitle = document.getElementById("data-price");
        courseTitle.value = obj.options[obj.selectedIndex].getAttribute("data-price", 2);
        };
    </script>



    <script>
        $(document).ready(function () {

            $('.userbtn').on('click', function () {

                $('#useraddmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

            });
        });
    </script>


    <script>
        $(document).ready(function () {

            $('body').on('click','.editbtn', function (e) {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#id').val(data[1]);
                $('#email').val(data[3]);
                $('#number').val(data[4]);
                $('#dropdown').val(data[7]);
                $('#bill').val(data[8]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('body').on('click','.deletebtn', function (e) {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[1]);

            });
        });
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

<script type="text/javascript">
    function selectChangedadd () 
{ 
var obj = document.getElementById("address");
var courseTitle = document.getElementById("data-price1");
courseTitle.value = obj.options[obj.selectedIndex].getAttribute('data-price1', 2);

var courseTitle2 = document.getElementById("data-price2");
courseTitle2.value = obj.options[obj.selectedIndex].getAttribute('data-price2', 2);
}
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


<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>

</body>

</html>