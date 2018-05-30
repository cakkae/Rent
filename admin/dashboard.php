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

 $sql = "SELECT id, VehiclesTitle FROM tblvehicles";
 $upit = $dbh->prepare($sql);    
 $upit->execute();		

if(isset($_POST['submit']))
{
$auto=$_POST['auto']; 
$datumOd = $_POST['datumOd'];
$datumDo = $_POST['datumDo'];
$privilegija = $_POST['privilegija'];

$sql = "SELECT VehicleId, FromDate, ToDate, privilegija FROM tblbooking WHERE privilegija = '$privilegija' AND ('$datumOd' BETWEEN FromDate AND ToDate) OR ('$datumDo' BETWEEN FromDate AND ToDate)";

$rezultat = $dbh->prepare($sql);
$rezultat->execute();
$brojac = $rezultat->rowCount();
$datum=$rezultat->fetch(PDO::FETCH_ASSOC);

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
	
	<title>liliRENT | Kontrolna ploča</title>

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
	<link rel="stylesheet" href="css/login.css">

	
</head>

<body>
	
<?php include('includes/header.php'); ?>

	<div class="ts-main-content">
		
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
				    <?php $korisnik= $_SESSION['username'];?>
					<div class="col-md-12">

						

			<div class="row-one">
				
		<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php
$sql2 ="SELECT id, FromDate, privilegija FROM tblbooking WHERE MONTH(FromDate) = MONTH(CURRENT_DATE())-1 AND privilegija = '$korisnik' ";


$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
													<div class="stat-panel-title text-uppercase">Prošli mjesec</div>
												</div>
											</div>
									<a href="prosliMjesec.php" class="block-anchor panel-footer">Pročitaj više <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>		




							<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php
$sql2 ="SELECT id, FromDate, privilegija FROM tblbooking WHERE MONTH(FromDate) = MONTH(CURRENT_DATE()) AND privilegija = '$korisnik' ";



$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
													<div class="stat-panel-title text-uppercase">Trenutni mjesec</div>
												</div>
											</div>
									<a href="TrenutniMjesec.php" class="block-anchor panel-footer">Pročitaj više <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>	


							<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php
$sql2 ="SELECT id, FromDate, privilegija FROM tblbooking WHERE privilegija = '$korisnik'";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
													<div class="stat-panel-title text-uppercase">Ukupno</div>
												</div>
											</div>
									<a href="manage-bookings.php" class="block-anchor panel-footer">Pročitaj više <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>	


						</br></br>
						
							
<div class="row-one">
				<h2 style="text-align: center;">Provjera dostupnosti automobila</h2>
		</br>	
		<div class="col-md-2">
			<p style="font-size: 18px; text-align: center; margin-top: 7px;">Izaberite automobil:
		</div>
		<div class="col-md-2">
			<form method="post" class="form-horizontal">
			<input type="hidden" class="form-control" name="privilegija" id="privilegija"
		 value="<?php echo $_SESSION['username'] ?>" >
			<select class="form-control" name="auto" id = "auto" style="color:black;" > 
   <?php

    while($row=$upit->fetch(PDO::FETCH_ASSOC)){
  echo "<option value=" .$row['id'] . ">" . $row['VehiclesTitle'] . "</option>";
     
    }
?>
 </select> 
		</div>

		<div class="col-md-1">
			<p style="font-size: 18px; text-align: center; margin-top: 7px;">od:
		</div>
		<div class="col-md-2">
			<input type="date" class="form-control" name="datumOd" placeholder="YYYY-MM-DD">
		</div>

		<div class="col-md-1">
			<p style="font-size: 18px; text-align: center; margin-top: 7px;">do:
		</div>
		<div class="col-md-2">
			<input type="date" class="form-control" name="datumDo" placeholder="YYYY-MM-DD">
		</div>

		<div class="col-md-1">
			<button class="btn btn-primary" type="submit" name="submit">Provjerite</button>
		</div></form>



		<?php if($brojac == 1){?>
		<div class="col-md-12">
			<div class="alert alert-warning">
  				<strong>Zauzeto!</strong> Automobil je zauzet u tom vremenskom periodu odaberite drugi vremenski period.
		</div>
		<div row>
			<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											
											<th>Datum od</th>
											<th>Datum do</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
											<th>Datum od</th>
											<th>Datum do</th>
										</tr>
										</tr>
									</tfoot>
									<tbody>

<?php 

$sql = "SELECT FromDate, ToDate from tblbooking WHERE privilegija='$korisnik' AND VehicleId = '$auto'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
							
											<td><?php echo htmlentities($result->FromDate);?></td>
											<td><?php echo htmlentities($result->ToDate);?></td>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						
		</div>
		</div>
		<?php }else if($brojac == 0){?>
		<div class="col-md-12"><div class="alert alert-success">
  				<strong>Slobodan!</strong> Automobil je slobodan. Ukoliko želite rezervisati pritisnite dugme "Dodaj rezervaciju"
		</div>
			<center>	<button onclick="location.href = 'http://liliumdev.me/<?php echo $korisnik;?>/post-booking.php'" type="button" class="btn btn-primary btn-md">Dodaj rezervaciju</button></center></div>
		<?php }?>


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
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>