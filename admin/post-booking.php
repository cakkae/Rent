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
 $sql = "SELECT id, VehiclesTitle FROM tblvehicles";
 $upit = $dbh->prepare($sql);    
 $upit->execute();



if(isset($_POST['submit']))
{
$ime=$_POST['ime']; 
$auto = $_POST['auto'];
$datumOd = $_POST['datumOd'];
$datumDo = $_POST['datumDo'];
$poruka = $_POST['poruka'];
$privilegija = $_POST['privilegija'];

//$sql="INSERT INTO  tblbrands(BrandName, privilegija) VALUES(:brand,	:kor)";
$sql = "INSERT INTO tblbooking(userEmail, VehicleId, FromDate, ToDate, message, privilegija, Status) VALUES (:ime, :auto, :datumOd, :datumDo, :poruka, :privilegija, 0)";


$query = $dbh->prepare($sql);
$query->bindParam(':ime',$ime,PDO::PARAM_STR);
$query->bindParam(':auto',$auto,PDO::PARAM_STR);
$query->bindParam(':datumOd',$datumOd,PDO::PARAM_STR);
$query->bindParam(':datumDo',$datumDo,PDO::PARAM_STR);
$query->bindParam(':poruka',$poruka,PDO::PARAM_STR);
$query->bindParam(':privilegija',$privilegija,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Rezervacije je uspješno dodana";
}
else 
{
$error="Nešto nije uredu. Molimo pokušajte ponovo";
}

}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
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
			<div class="container-fluid">
				
				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Dodaj rezervaciju</h2>

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-heading">Polja forme</div>
									<div class="panel-body">
										<form method="post" name="chngpwd" id="forma" class="form-horizontal" onSubmit="return valid();">
										
											
  	        	  <?php if($error){?><div class="errorWrap"><strong>GREŠKA</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>USPJEŠNO</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						<div class="form-group">
												<label class="col-sm-4 control-label">Ime i prezime</label>
												<div class="col-sm-8">
		<input type="text" class="form-control" name="ime" id="ime" required>
	</div>
		</div>

		<div class="form-group">
												<label class="col-sm-4 control-label">Vozilo</label>
												<div class="col-sm-8">
		<select class="form-control" name="auto" id = "auto" style="color:black;"> 
   <?php

    while($row=$upit->fetch(PDO::FETCH_ASSOC)){
  echo "<option value=" .$row['id'] . ">" . $row['VehiclesTitle'] . "</option>";
     
    }
?>
 </select> 
	</div>
		</div>

		<div class="form-group">
												<label class="col-sm-4 control-label">Datum od</label>
												<div class="col-sm-8">
		<input type="date" class="form-control" name="datumOd" id="datumOd" required>
	</div>
		</div>

		<div class="form-group">
												<label class="col-sm-4 control-label">Datum do</label>
												<div class="col-sm-8">
		<input type="date" class="form-control" name="datumDo" id="datumDo" required>
		
	</div>
		</div>

		<div class="form-group">
												<label class="col-sm-4 control-label">Poruka</label>
												<div class="col-sm-8">
		<textarea class="form-control" name="poruka" id="poruka" required> </textarea>
	</div>
		</div>

		<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								
													<button class="btn btn-primary" name="submit" type="submit">Dodaj</button>
												</div>
											</div>

											<div class="hr-dashed"></div>
						<div class="form-group">
							
												<div class="col-sm-8">
		
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

<script>
$(document).ready(function() {
    $('#forma').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            datumOd: {
                validators: {
                    datumOd: {
                        message: 'Molimo izaberite drugi datum!',
                        format: 'DD/MM/YYYY'
                    },
                    callback: {
                        message: 'Datum ne može biti odabran',
                        callback: function(value, validator) {
                            var m = new moment(value, 'YYYY/MM/DD', true);
                            if (!m.isValid()) {
                                return false;
                            }
                            return m.isAfter('2000/01/01') && m.isBefore('2015/12/30');
                        }
                    }
                }
            }
        }
    });
});
</script>




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