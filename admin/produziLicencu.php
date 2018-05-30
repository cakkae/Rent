<?php
?>
<html>
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

		.naslov {

			font-size: 60px;
			color:white;
			text-align: center;
			margin-top: 2%;
			font-family: "mojFont";
		}

		.podNaslov {

			font-size: 32px;
			color:white;
			text-align:center;
			font-family: "mojFont";
			
		}


	</style>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
<body style="background-image: url(img/istekLicence.jpg); background-repeat: no-repeat;">
<p class="naslov"> <b>FORMA ZA PRODUŽAVANJE LICENCE</p>
	<p class="podNaslov">Ukoliko želite produžiti licencu molimo popunite polja ispod</p>
	

	<form style="text-align: center; color: white; font-family: 'mojFont'"
	method="POST">

	<div class="form-group"> <!-- Name field -->
		<label class="control-label " for="name" style="font-size: 24px;">Ime</label>
		<center><input class="form-control" id="name" name="name" type="text" style="height: 45px; width: 30%;font-size: 22px; width: 30%;"  /></center>
	</div>
	
	<div class="form-group"> <!-- Email field -->
		<label class="control-label requiredField" style="font-size: 24px;" for="email">Email<span class="asteriskField"></span></label>
		<center><input class="form-control" id="email" name="email" type="text" style="height: 45px; width: 30%;font-size: 22px; width: 30%;"/></center>
	</div>
	
	<div class="form-group"> <!-- Subject field -->
		<label class="control-label " for="subject" style="font-size: 24px;">Paket</label>
		<center>
			<select name="paket" id="paket" class="form-control" style="height: 45px; font-size: 22px; width: 30%;"> 
				<option value="default">Izaberite paket ...</option>
				<option value="prvi">Paket EASY 29.99 KM/mjesečno</option>
				<option value="drugi">Paket MEDIUM 49.99 KM/mjesečno</option>
				<option value="treci">Paket ULTIMATE 74.99 KM/mjesečno</option>
			</select>
			</center>
	</div>
	
	<div class="form-group"> <!-- Message field -->
		<label class="control-label " for="message" style="font-size: 24px;">Poruka</label>
		<center><textarea class="form-control" cols="40" id="message" name="message" rows="10" style="height: 190px; width: 30%;font-size: 22px; width: 30%;"></textarea></center>
	</div>
	
	<div class="form-group">
		<center><button type="button" class="btn btn-primary" style="font-size: 22px; ;width: 20%; height: 7%; font-family: 'mojFont2';" name="submit" type="submit">Produžite licencu</button></center>
	</div>
	
</form>		


</body>
</html>