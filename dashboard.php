<?php
include_once("init.php");

?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>POSNIC - Dashboard</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<?php include_once("tpl/common_js.php"); ?>
	<script src="js/script.js"></script>  
</head>
<body>

	<!-- TOP BAR -->
	<?php include_once("tpl/top_bar.php"); ?>
	<!-- end top-bar -->
	<?php include_once("analyticstracking.php") ?>
	
	
		<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.php" class="active-tab dashboard-tab">Panel de control</a></li>
				<li><a href="view_sales.php" class="sales-tab">Ventas</a></li>
				<li><a href="view_customers.php" class=" customers-tab">Clientes</a></li>
				<li><a href="view_purchase.php" class="purchase-tab">Compra</a></li>
				<li><a href="view_supplier.php" class=" supplier-tab">Proveedor</a></li>
				<li><a href="view_product.php" class=" stock-tab">Cantidad / Producto</a></li>
				<li><a href="view_payments.php" class="payment-tab">Pagos / Importe Total</a></li>
				<li><a href="view_report.php" class="report-tab">Reportes</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
                         <?php $line = $db->queryUniqueObject("SELECT * FROM store_details ");
			$_SESSION['logo']=$line->log; 
			 ?>
                        <a href="#" id="company-branding-small" class="fr"><img src="<?php if(isset($_SESSION['logo'])) { echo "upload/".$_SESSION['logo'];}else{ echo "upload/posnic.png"; } ?>" alt="Point of Sale" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>Enlaces rápidos</h3>
				<ul>
					<li><a href="add_sales.php">Agregar Ventas</a></li>
					<li><a href="add_purchase.php">Agregar Compras</a></li>
					<li><a href="add_supplier.php">Agregar Proveedor</a></li>
					<li><a href="add_customer.php">Agregar Clientes</a></li>
					<li><a href="view_report.php">Reportes</a></li>
				</ul>
                                
                                 
			</div> <!-- end side-menu -->
                        
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Estadisticas</h3>
						<span class="fr expand-collapse-text">Haga click para contraer</span>
						<span class="fr expand-collapse-text initial-expand">Haga click para expander</span>
					
					</div> <!-- end content-module-heading -->
					
						<div class="content-module-main cf">
				
							
								<table style="width:350px; float:left;" border="0" cellpadding="0" cellspacing="0">
								  <tr>
									<td width="250" align="left">&nbsp;</td>
									<td width="150" align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">Numero Total de Productos</td>
									<td align="left"><?php echo  $count = $db->countOfAll("stock_avail");?>&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">Transacciones de Ventas Totales </td>
									<td align="left"><?php echo  $count = $db->countOfAll("stock_sales");?></td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">Numero Total de Proveedores </td>
									<td align="left"><?php echo $count = $db->countOfAll("supplier_details");?></td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">Numero Total de Clientes </td>
									<td align="left"><?php echo $count = $db->countOfAll("customer_details");?></td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
								  <tr>
									<td align="left">&nbsp;</td>
									<td align="left">&nbsp;</td>
								  </tr>
						  </table>
				
				<table style="width:600px; margin-left:50px; float:left;" border="0" cellspacing="0" cellpadding="0">
				  <tr>
                                      <td>&nbsp;</td>
					<td width="250" align="left">Hogar (Ctrl+0) </td>
					<td width="150" align="left">Agregar Compra(Ctrl+1)</td>
				
                                        
				  </tr>
				  <tr><td>&nbsp;</td>
                                      	<td width="250" align="left">Agregar Cantidad(Ctrl+2)</td>
					<td align="left">Agregar Venta(Ctrl+3)</td>
					
				  </tr>
				  <tr><td>&nbsp;</td>
                                      	<td align="left">Agregar Categoria (Ctrl+4 ) </td>
					<td align="left">Agregar Proveedor (Ctrl+5 )</td>
					
				  </tr>
				  <tr><td>&nbsp;</td>
					<td align="left">Agregar Cliente (Ctrl+6)</td>
					<td align="left">Ver Cantidad (Ctrl+7)</td>
					
				  </tr>
				  <tr><td>&nbsp;</td>
                                      <td align="left">Ver Ventas(Ctrl+8)</td>
					<td align="left">Ver Compra (Ctrl+9) </td>
					
				  </tr>
				  <tr><td>&nbsp;</td>
                                      <td align="left">Agregar Nuevo (Ctrl+a)</td>
					<td align="left">Guardar( Ctrl+s ) </td>
					
				  </tr>
				
				</table>
						<!--<ul class="temporary-button-showcase">
							<li><a href="#" class="button round blue image-right ic-add text-upper">Add</a></li>
							<li><a href="#" class="button round blue image-right ic-edit text-upper">Edit</a></li>
							<li><a href="#" class="button round blue image-right ic-delete text-upper">Delete</a></li>
							<li><a href="#" class="button round blue image-right ic-download text-upper">Download</a></li>
							<li><a href="#" class="button round blue image-right ic-upload text-upper">Upload</a></li>
							<li><a href="#" class="button round blue image-right ic-favorite text-upper">Favorite</a></li>
							<li><a href="#" class="button round blue image-right ic-print text-upper">Print</a></li>
							<li><a href="#" class="button round blue image-right ic-refresh text-upper">Refresh</a></li>
							<li><a href="#" class="button round blue image-right ic-search text-upper">Search</a></li>
						</ul>-->
				
					</div> <!-- end content-module-main -->
							
				
				</div> <!-- end content-module -->
				
			    
		
		</div> <!-- end full-width -->
			
                </div>
            </div>
        <div>
     
        </div>
	
	<!-- FOOTER -->
	<div id="footer">
	<div id="fb-root"></div>
		


</body>
</html>