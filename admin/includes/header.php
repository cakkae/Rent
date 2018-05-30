<?php 
('index.php');
include('includes/config.php');
$email = $_SESSION['username'];
$sql ="SELECT brojDana, UserName FROM admin WHERE UserName='$email'";
$query= $dbh -> prepare($sql);
$query->execute();
$row = $query->fetch();
date_default_timezone_set('Europe/Sarajevo');
$datumPrvi = new DateTime($row[brojDana]);
$datumDrugi = new DateTime("now");
$interval = $datumPrvi->diff($datumDrugi);
?>


<head>
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
	</style>
</head>

<div class="brand clearfix" >
	<a href="dashboard.php" style="font-size: 20px;"><img src="/assets/images/logoBijeli.png" style="margin-left:10px; width:160px; height:70px"></a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span> 

		<div style="display: inline-block; margin-left:25%; color:white;">
<h3 style="font-family: 'mojFont';"> Licenca vam ističe za: <?php if($datumPrvi <= $datumDrugi) 
echo "<script type='text/javascript'> document.location = 'isteklaLicenca.php'; </script>";
else   
if($datumPrvi != $datumDrugi) echo $interval->days+1; {
	# code...
}	 ;?> dan/a</h3></div>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" style="height:50px;"class="ts-avatar hidden-side" alt=""> 

			<?php 

      echo $_SESSION['username']  ?>

				 <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a href="change-password.php">Promjenite šifru</a></li>
					<li><a href="logout.php">Odjavite se</a></li>
				</ul>
			</li>
		</ul>

	</div>

	<?php if($interval->days+1 == 1) { ?>
<div style="position: absolute; z-index: 12; margin-left: 70%; margin-top: 30%; margin-right: 2%; color: black;">
	<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading"><b>ISTICANJE LICENCE!</b></h4>
  <p>Poštovani, danas Vam je posljedni dan aktivne licence, da bi produžili licencu
  potrebo je da nadokupite odgovarajući paket.</p>
  <p class="mb-0">Paket možete nadoplatiti na sledećem <a href="/admin/produziLicencu.php"><b>linku</a></p>
</div>
</div>
<?php
}?>