<?php 
require_once("config.php");
require_once("logsession.php");

if(isset($_SESSION['logged']))
{
    if ($_SESSION['logged'] == true)
    {
        if ($_SESSION['account']=="admin") {
                header("Location:Admin/dashboard");
            }
        elseif ($_SESSION['account']=="financeadmin") {
                header("Location:financeAdmin/dashboard");
            }
        elseif ($_SESSION['account']=="user") {
                header("Location:User/index");
            }
    }  
    else  {
        header("Location:../index.php");
      }  
}

if(isset($_POST['login_submit'])) {
    if(!(isset($_POST['email']))) {
        if(!(isset($_POST['pass']))) {
            location('index');    
        }
    }
}


?>

<!DOCTYPE html>


<html lang="en">
<head>
  <!-- Meta Tags -->
  <meta charset="utf-8"/>

  <!-- Site Title-->
  <title style="font-family:'Poppins',sans-serif;">KloudNet</title>

  <!-- Mobile Specific Metas-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  <!-- Google-fonts -->

  <link href='http://fonts.googleapis.com/css?family=Signika+Negative:300,400,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Kameron:400,700' rel='stylesheet' type='text/css'>
  
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <!-- Fonts-style -->
  <link rel="stylesheet" href="css/styles.css"/>
   <link rel="stylesheet" href="css/new.css"/>
  <!-- Fonts-style -->
  <link rel="stylesheet" href="css/font-awesome.min.css"/>
  <!-- Modal-Effect -->


  <link href="css/component.css" rel="stylesheet">
  <!-- owl-carousel -->
  <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
  <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">
  <!-- Template Styles-->
  <link rel="stylesheet" href="css/style.css"/>
  <!-- Template Color-->
  <link rel="stylesheet" type="text/css" href="css/green.css" media="screen" id="color-opt" />
    <link rel="icon" type="image/x-icon" href="/images/favicon1.png">


</head>

<body data-spy="scroll" data-offset="80" style="font-family:'Poppins',sans-serif;">


          <div class="modal fade" id="useraddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="first">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel" style="text-align: center;">KloudNet Login</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">


                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                >
                        </div><br>

                        <div class="form-group">
                            <label> Password </label>
                            <input type="password" name="pass" id="pass" class="form-control"
                                >
                        </div>
                            <label ><a href="reset.php">Forgot Password?</a></label> 
                            <label style="float:right;" class="userreg" data-toggle="modal"><a href="#">Register</a></label>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="login_submit" class="btn btn-primary">Log-in</button>
                    </div>

                </form>

            </div>
        </div>
        </div>
    </div>



        <div class="modal fade" id="useraddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="first">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">


                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control"
                                >
                        </div><br>

                        <div class="form-group">
                            <label> Password </label>
                            <input type="password" name="pass" id="pass" class="form-control"
                                >
                        </div><br>
                            
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="login_submit" class="btn btn-primary">Log-in</button>
                    </div>

                </form>

            </div>
        </div>
        </div>
    </div>


    <div class="modal fade" id="userregmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Registration Form</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <form action="insert.php" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control"
                                required="required">
                        </div><br>
                        
                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="lastName" type="text"  class="form-control"
                                required="required">
                        </div><br>
                        
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input name="middleName" type="text"  class="form-control"
                                required="required">
                        </div><br>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"
                                required="required">
                        </div><br>

                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" name="number" class="form-control"
                                required="required" maxlength="11">
                        </div><br>

                        <div class="form-group">
                            <label> Password </label>
                            <input type="password" id="password" name="pw" class="form-control"
                                required="required" >
                        </div><br>
                        
                        <div class="form-group">
                            <label> Confirm Password </label>
                            <input type="password" id="confirm_password" class="form-control"
                                required="required" >
                        </div><br>
    <label>Barangay</label>
  <select name="addr" id="address" class="address"  onchange="javascript:selectChangedadd();" style="font-weight:bold;">
    <?php
        $link = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");

        if(!$link)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $records = mysqli_query($link, "SELECT * FROM address");
        echo "<option selected disabled>-Select Address-</option>";
        while($obj = $records->fetch_object())
        {
           echo '<option  data-price1="'.$obj->municipality.'" data-price2="'.$obj->province.'" value="'.$obj->barangay.'">'.$obj->barangay.'</option>';
        }
    ?>  
    </select><br><br>
    
            <label>Municipality</label>
            <input name="municipality" id="data-price1"  type="text"  class="form-control" required="required" >
            <br>
                        
            
            <label>Province</label>
            <input name="province" id="data-price2"  type="text"  class="form-control" required="required" >
            <br>

    

  <select name="dropdown" id="dropdown" class="product" onchange="javascript:selectChanged();" style="font-weight: bold; font-size: 15px;">
    <?php
        $link = mysqli_connect("localhost","id18794570_mydb","byU=^D})=1YGb/IG","id18794570_kdb");

        if(!$link)
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $records = mysqli_query($link, "SELECT * FROM plans");
        echo "<option selected disabled>-Available Plan-</option>";
        while($obj = $records->fetch_object())
        {
           echo '<option data-price="'.$obj->cost.'" value="'.$obj->planName.'">'.$obj->planName.'</option>';
        }
    ?>  
</select>
<input type="hidden" id="data-price" type="text" name="bill" />


  <input type="hidden" name="status" value="DISCONNECTED"><br><br>

            <div class="tacbox">
        <input id="checkbox" type="checkbox" required="required" />
        <label for="checkbox" > I agree to these <a href="#">Terms and Conditions</a>.</label>
                    </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="userreg" class="btn btn-primary" >Register</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    


  <!-- Preloader -->
  <div class="animationload">
    <div class="loader">
        Please Wait....
    </div>
  </div> 
  <!-- End Preloader -->


  <nav class="navbar navbar-default navbar-fixed-top navbar-custom" >
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" style="font-family:'Poppins',sans-serif; font-size: 35px;">KLOUDNET</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#home">Home</a></li>
          <li><a href="#" class="userreg" data-toggle="modal">Register Now</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#" class="userbtn" data-toggle="modal"> Log-In</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav>


    <section class="main-home" id="home" >
      <div class="home-page-photo"></div> <!-- Background image -->
      <div class="home__header-content">
        <div id="main-home-carousel" class="owl-carousel">
          <div>
            <h1 class="intro-title" style="font-family:'Poppins',sans-serif;">Kloudnet ICT Solutions and Services</h1>
            <p class="intro-text" style="font-family:'Poppins',sans-serif;">Our Company consists of two Solutions. It comprises Communication and Internet Services and ICT Solutions.<br> The first solution that we offer is communication and Internet services.<br> The process is that the system has its backbone from main telco and distributing it to Mountain province<br> only accessible by giant telco, and we are the one who provide it. The Second Solution that we also offer is the ICT solution.<br> The ICT Solution concludes into a distinct category. It consists of hardware and services repair, networking solution, consultation,<br> and others that can do any help for the client to improve their needs.</p>
            <a class="btn btn-custom userreg" href="#"  data-toggle="modal">Register Now</a>
          </div><!--slide item like paragraph-->


    </section>



    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center" style="font-family:'Poppins',sans-serif;">Available Fibr Plans</h3>
            <div class="titleHR"><span></span></div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-4"> 
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-settings-streamline-2 color-l-purple"></i> 
                </div>
                <h5>Fibr Plan A 8 Mbps 850</h5>
                <p>With Fibr Plan A 8 Mbps you can now browse through your favorite social media apps and services this plan only caters 2-4 devices.</p>
                <a href="" style="font-size: 23px;" class="userreg" data-toggle="modal">REGISTER NOW</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4"> 
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-settings-streamline-2 color-l-purple"></i> 
                </div>
                <h5>Fibr Plan B 10 Mbps 1199</h5>
                <p>With Fibr Plan B 10 Mbps you can now browse through your favorite social media apps and services and connect multiple devices.</p>
                <a href="" style="font-size: 23px;" class="userreg" data-toggle="modal">REGISTER NOW</a>
              </div>
            </div>
          </div>

          <div class="col-sm-4"> 
            <div class="text-center services-item">
              <div class="col-wrapper">
                <div class="icon-border"> 
                  <i class="icon-settings-streamline-2 color-l-purple"></i> 
                </div>
                <h5>Fibr Plan C 15 Mbps 1499</h5>
                <p>With Fibr Plan C 15 Mbps you can now browse through your favorite social media apps and services and connect multiple devices play games all day without worrying about lag you can also stream multiple movies and videos without any worries.</p>
                <a href="" style="font-size: 23px;" class="userreg" data-toggle="modal">REGISTER NOW</a>
              </div>
            </div>
          </div>
        </div> <!--/.row -->

      </div> <!--/.container -->
    </section>
    <!-- / End services-->


    <!-- TWITTER TWEET -->

    <!-- End TWITTER TWEET -->

    <!-- CONTACT -->
    <section id="contact" style="font-family:'Poppins',sans-serif;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="title text-center" style="font-family:'Poppins',sans-serif;">Contact Us</h3>
            <div class="titleHR"><span></span></div>

            <form role="form" name="ajax-form" id="ajax-form" action="php/contactUs.php" method="POST" class="form-main">
              <div class="col-xs-12">
                <div class="row">            
                  <div class="form-group col-xs-6">
                    <label for="name2">Name</label>
                    <input class="form-control" id="name2" name="fullName" onblur="if(this.value == '') this.value='Name'" onfocus="if(this.value == 'Name') this.value=''" type="text" value="Name">
                    <div class="error" id="err-name" style="display: none;">Please enter name</div>
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="email2">Email</label>
                    <input class="form-control" id="email2" name="email" type="text" onfocus="if(this.value == 'E-mail') this.value='';" onblur="if(this.value == '') this.value='E-mail';" value="E-mail">
                    <div class="error" id="err-emailvld" style="display: none;">E-mail is not a valid format</div> 
                  </div>
                </div>
                <div class="row">            
                  <div class="form-group col-xs-12">
                    <label for="message2">Message</label>
                    <textarea class="form-control" id="message2" name="msg" onblur="if(this.value == '') this.value='Message'" onfocus="if(this.value == 'Message') this.value=''">Message</textarea>
                    <div class="error" id="err-message" style="display: none;">Please enter message</div>
                  </div>
                </div> 
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <p class="text-center con_sub_text">For more inquiries you can contact us using the form above.</p>
                  </div>
                </div>
                <div class="row">            
                  <div class="col-xs-12 text-center">
                    <div id="ajaxsuccess">E-mail was successfully sent.</div>
                    <div class="error" id="err-form" style="display: none;">There was a problem validating the form please check!</div>
                    <div class="error" id="err-timedout">The connection to the server timed out!</div>
                    <div class="error" id="err-state"></div>
                    <button type="submit" class="btn btn-custom" id="send">Submit</button>
                  </div>
                </div>
              </div>  
            </form>

          </div> <!-- end col-md-12 -->
        </div> <!-- end row -->
      </div> <!-- container -->
    </section>
    <!-- End CONTACT -->

    <!-- FOOTER begings -->
    <footer id="footer" style="font-family:'Poppins',sans-serif;">    
      <div class="footer-widgets-wrap">
        <div class="container text-center">    
          <div class="row">
            <div class="col-sm-4 col-md-4">
              <div class="footer-content">
                <h4 style="font-family:'Poppins',sans-serif;">KEEP IN TOUCH</h4>
                <div class="footer-socials">
                  <a target="_blank" href="mail.google.com"><i class="fa fa-google-plus"></i></a>
                  <!--<a href="#"><i class="fa fa-facebook"></i></a>-->
                </div>
              </div> <!-- end footer-content -->
            </div> <!-- end col-sm-4 -->
            <div class="col-sm-4 col-md-4">
              <div class="footer-content">
                <h4>ADDRESS</h4>
                <a target="_blank"href="https://goo.gl/maps/G8YfzUwTRGhWYEtZ7">FL.Peña,Kabasalan<br>
                Zamboanga Sibugay</a><br><br>
                <p>+639269908478<br>
                KloudnetICT@gmail.com</p>
              </div> <!-- end footer-content -->
            </div> <!-- end col-sm-4 -->
 <!-- end col-sm-4 -->
          </div> <!-- end row -->
        </div> <!-- container -->
      </div>
      <div class="footer-bottom text-center"> <!-- Footer-copyright -->
        <p>KloudNet ICT Solutions</p>
      </div>
    </footer>
    <!-- End footer begings -->


    <!-- Scroll top -->
    <a href="#" class="back-to-top"> <i class="fa fa-chevron-up"> </i> </a>



        


    
    <!-- JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <!-- initialize jQuery Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


     <script src="js/jquery.min.js"></script>
     <!-- jquery easing -->
     <script src="js/jquery.easing.min.js"></script>
     <!-- Bootstrap -->
     <script src="js/bootstrap.min.js"></script>
     <!-- modal-effect -->
     <script src="js/classie.js"></script>
     <script src="js/modalEffects.js"></script>
     <!-- Counter-up -->
     <script src="js/waypoints.min.js" type="text/javascript"></script>
     <script src="js/jquery.counterup.min.js" type="text/javascript"></script>
     <!-- SmoothScroll -->
     <script src="js/SmoothScroll.js"></script>
     <!-- Parallax -->
     <script src="js/jquery.stellar.min.js"></script>
     <!-- Jquery-Nav -->
     <script src="js/jquery.nav.js"></script>
     <!-- Owl carousel -->                                                      
     <script type="text/javascript" src="js/owl.carousel.min.js"></script>
     <!-- App JS -->
     <script src="js/app.js"></script>

     <!-- Switcher script for demo only -->
    <script type="text/javascript" src="js/switcher.js"></script>

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

            $('.userreg').on('click', function () {

                $('#userregmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

            });
        });
    </script>
    


<script type="text/javascript">
    function selectChanged () 
{ 
var obj = document.getElementById("dropdown");
var courseTitle = document.getElementById("data-price");
courseTitle.value = obj.options[obj.selectedIndex].getAttribute('data-price', 2);
}
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
  </body>
</html>
