<?php
session_start();
('index.php');
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
// Code for change password	

?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    
    <script type="text/javascript">
        function generisiKod()
        {
            a = document.getElementById("privilegija").value;
            b = "&lt;iframe src='http://liliumdev.me/"+a+"/lista-automobila.php' height='1600px' width='800px'&gt;&lt;/iframe&gt;"
            
            document.getElementById("kod").innerHTML = b
            <?php $msg = "Kod je uspješno generisan";?>
        }
    </script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>liliRENT | Dodavanje brenda</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	
	<style type="text/css">
		@font-face {
    font-family: mojFont;
    src: url(fonts/Akrobat-Thin.otf);
    font-weight: bold;
}

	@font-face {
    font-family: mojFont2;
    src: url(fonts/Akrobat-Bold.otf);
    font-weight: bold;
}

		.naslov {

			font-size: 32px;
			color:white;
			text-align: center;
			font-family: "mojFont";
		}
		
		.naslov2 {

			font-size: 22px;
			color:white;
			text-align: left;
			font-family: "mojFont";
		}

		.podNaslov {

			font-size: 22px;
			color:white;
			text-align:left;
			font-family: "mojFont2";
			
		}
		
		
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid" >
				
				<div class="row" >
					<div class="col-md-12">
					
					

						<div class="row">
							<div class="col-md-10" >
								<div class="panel panel-default" >
									<div class="panel-heading" style="background-color:#000028; color:white">Generisanje koda</div>
									<div class="panel-body" style="background-color:#000028;">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	  
						<div class="form-group">
												
												<div class="col-sm-12">
		<textarea type="text" readonly class="form-control" name="kod" id="kod" rows="1"></textarea></div>
		</div>

		<div class="form-group">
												<div class="col-sm-12 ">
								
													<center><button class="btn btn-primary" name="submit" type="button" onclick="generisiKod()">Generiši</button></center>
												</div>
											</div>

											<div class="hr-dashed">
											   
											</div>
						<div class="form-group">
							
												
			<div class="col-sm-12 ">
			    <h3 class="naslov">Upustvo:</h3> 
			    <h3 class="naslov2"> Poštovani, prilikom pritiska na dugme "generiši" dobit ćete kod koji ćete postaviti na Vašu stranicu. Kod možete postaviti bilo gdje na Vašu stranicu te će na istoj biti prikazani svi automobili koje ste vi dodali kroz ovaj panel. </h3></br> <h3 class="podNaslov"><b>Administracija liliRENT</h3></b>
		<input type="hidden" class="form-control" name="privilegija" id="privilegija"
		 value="<?php echo $_SESSION['username'] ?>" >
												</div>
											</div>
											
											
										
								
											
											

										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>
				
			
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
<?php } ?>