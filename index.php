<?php
session_start();
if(!include_once "config.php"){
           header("location:install.php");
 }
if (!defined('posnicEntry')) {
    define('posnicEntry', true);
}
if(isset($_SESSION['username'])) {
    if($_SESSION['usertype'] =='admin') // if session variable "username" does not exist.
	header("location:dashboard.php"); // Re-direct to index.php
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Login to Control Panel</title>
	
	<!-- Stylesheets -->
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/cmxform.css">
	<link rel="stylesheet" href="js/lib/validationEngine.jquery.css">
	
	<!-- Scripts -->
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
	
	<script>
	/*$.validator.setDefaults({
		submitHandler: function() { alert("submitted!"); }
	});*/
	
	$(document).ready(function() {
		
		// validate signup form on keyup and submit
		$("#login-form").validate({
			rules: {
				username: {
					required: true,
					minlength: 3
				},
				password: {
					required: true,
					minlength: 3
				}
			},
			messages: {
				username: {
					required: "Por favor, ingrese su usuario",
					minlength: "Tu usuario debe tener al menos 3 caracteres"
				},
				password: {
					required: "Por favor, ingrese su contraseña",
					minlength: "Tu contraseña debe tener al menos 3 caracteres"
				}
			}
		});
	
	});

	</script>

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>  
</head>
<body>

<!--    Only Index Page for Analytics   -->
<?php include_once("analyticstracking.php") ?>
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width">
		
			<!--<a href="#" class="round button dark ic-left-arrow image-left ">See shortcuts</a>-->

		</div> <!-- end full-width -->	
	
	</div> 
	<!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1>Inicia sesión para Dashboard</h1>
				<h5>Introduzca sus credenciales de abajo</h5>
			
			</div> <!-- login-intro -->
    
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="http://posnic.com/" id="company-branding" class="fr"  target="blank"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	<!-- MAIN CONTENT -->

	<div id="content">

		<form action="checklogin.php" method="POST" id="login-form" class="cmxform" autocomplete="off">
		
			<fieldset>
				<p> <?php 
				
				if(isset($_REQUEST['msg']) && isset($_REQUEST['type']) ) {
					
					if($_REQUEST['type'] == "error")
						$msg = "<div class='error-box round'>".$_REQUEST['msg']."</div>";
					else if($_REQUEST['type'] == "warning")
						$msg = "<div class='warning-box round'>".$_REQUEST['msg']."</div>"; 
					else if($_REQUEST['type'] == "confirmation")
						$msg = "<div class='confirmation-box round'>".$_REQUEST['msg']."</div>"; 
					else if($_REQUEST['type'] == "information")
						$msg = "<div class='information-box round'>".$_REQUEST['msg']."</div>"; 	
						
					echo $msg;						
				}
				?>
				
				</p>
				<p>
                                    <label>Usuario</label>
                                        <input type="text" id="login-username" class="round full-width-input" placeholder="Ingresar Usuario" name="username" autofocus  />
				</p>

				<p>
                                <label>Contraseña</label>
                                        <input type="password" id="login-password" name="password" placeholder="Ingresar Contraseña" class="round full-width-input"  />
				</p>
				
                                <a href="forget_pass.php" class="button ">¿Olvido su contraseña?</a>
				
				<!--<a href="dashboard.php" class="button round blue image-right ic-right-arrow">LOG IN</a>-->
				<input type="submit" class="button round blue image-right ic-right-arrow" name="submit" value="Ingrese" />
			</fieldset>

			<br/>
                        
               


		
	</div>
	</div> <!-- end content -->
     
	
	
	
	<!-- FOOTER -->
	<div id="footer">

	</div> <!-- end footer -->
        
       
</body>
</html>