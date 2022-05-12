<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/sign.css">
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link rel="shortcut icon" type="image/jpg" href="images/favi.png"/>
	<title>Sign-up</title>
</head>
<body>

	<div class="design">
	<div class="intro">
	<h1 style="color: #000000;"><br>KloudNet Registration Form</h1>
	</div>

		<form id="userform" action="insert.php" method="post">
		<div class="myform">
			<div class="mb-3 row">
    	<label for="inputEmail" class="col-sm-2 col-form-label">Full Name</label>
    		<div class="col-sm-10">
      		<input type="text" class="form-control" id="inputName" required name ="firstName">
    			</div>
    		</div>
    		<br>

    		 <div class="mb-3 row">
    	<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
    		<div class="col-sm-10">
      		<input type="text" class="form-control" id="inputEmail" required name="email">
    			</div>
    		</div>
    		<br>

    		 <div class="mb-3 row">
    	<label for="inputEmail" class="col-sm-2 col-form-label">Contact</label>
    		<div class="col-sm-10">
      		<input type="text" class="form-control" id="inputNumber" required name="number">
    			</div>
    		</div>
    		<br>

  			<div class="mb-3 row">
    	<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    		<div class="col-sm-10">
      		<input type="text" class="form-control" id="inputPassword" required name="pw">
    			</div>
  			</div>
  			<br>

    		 <div class="mb-3 row">
    	<label for="inputEmail" class="col-sm-2 col-form-label">Address</label>
    		<div class="col-sm-10">
      		<input type="text" class="form-control" id="inputAdd" required name="addr">
    			</div>
    		</div>
    		<br>

  <select name="dropdown">
    <option disabled selected>-- Select Fibr Plan --</option>
    <?php
        $link = mysqli_connect("localhost","root","","kdb");

		if(!$link)
		{
    		die("Connection failed: " . mysqli_connect_error());
		}

        $records = mysqli_query($link, "SELECT planName From plans");   

        while($row = mysqli_fetch_array($records))
        {
            echo "<option value='". $row['planName'] ."'>" .$row['planName'] ."</option>";  // 
        }	
    ?>  
  </select>
         
         <br>
         <br>          	
         <br>

 			<div class="tacbox">
  		<input id="checkbox" type="checkbox" type="required" />
  		<label for="checkbox" > I agree to these <a href="#">Terms and Conditions</a>.</label>
					</div>

  			<br>
    		<button type="submit" class="btn btn-primary">Register</button>

    		<label>
    			<a href="index.php" style="text-decoration: none; color: #000000; font-family: 'Poppins',sans-serif;" ><strong>Return</strong></a>
    		</label>
  					</div>

  			<br>
  			<input type="hidden" name="status" value="DISCONNECTED">
	</form>
		</div>
		<br>
		<script type="text/javascript" src="js/nav.js"></script>
</body>
</html>