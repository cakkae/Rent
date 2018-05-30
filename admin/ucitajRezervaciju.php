<?php



$privilegija = $_POST['privilegija'];
$sql = "SELECT tblbooking.userEmail, tblbooking.FromDate, tblbooking.ToDate, tblbooking.message, tblbooking.Status, tblbooking.privilegija, tblbooking.PostingDate, tblbrands.BrandName, tblvehicles.VehiclesTitle, tblbooking.VehicleId as vid, tblbooking.id FROM tblbooking 
INNER JOIN tblvehicles ON tblvehicles.id = tblbooking.VehicleId INNER JOIN tblbrands ON 
tblbrands.id = tblvehicles.VehiclesBrand";
$query = $dbh -> prepare($sql);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{?>	

	<tr>
		<h1><?php echo $privilegija;?></h1>
	<td style="vertical-align: middle;"><?php echo htmlentities($cnt);?></td>
	<td style="vertical-align: middle;"><?php echo htmlentities($result->userEmail);?></td>
	<td style="vertical-align: middle;"><a href="edit-vehicle.php?id=<?php echo htmlentities($result->vid);?>"><?php echo htmlentities($result->userEmail);?> , <?php echo htmlentities($result->VehiclesTitle);?></td>
	<td style="vertical-align: middle;"><?php echo htmlentities($result->FromDate);?></td>
	<td style="vertical-align: middle;"><?php echo htmlentities($result->ToDate);?></td>
	<td style="vertical-align: middle;"><?php echo htmlentities($result->message);?></td>
	<td style="vertical-align: middle;"><?php
				
				if($result->Status==0) : ?>
	<span class="label label-warning">Čekanje</span>
				<?php endif; ?>

				<?php
				if($result->Status==1) : ?>
	<span style="" class="label label-success">Potvrđeno</span>
				<?php endif; ?>

				<?php
				if($result->Status==2) : ?>
	<span class="label label-danger">Otkazano</span>
				<?php endif; ?>
	</td>
	<td style="vertical-align: middle;"><?php echo htmlentities($result->PostingDate);?></td>
	<td style="vertical-align: middle;">
	<center><button class="btn btn-success"><a style="color:white;" href="manage-bookings.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return window.confirm('Da li želite potvrditi rezervaciju?')"> Potvrdite</a></button> </td>

		<td style="vertical-align: middle;">
<button class="btn btn-danger" ><a style="color:white;"href="manage-bookings.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Da li želite otkazati rezervaciju?')"> Otkažite</a>
</center>
</td>

										</tr>
		<input type="hidden" class="form-control" name="privilegija" id="privilegija"
		 value="<?php echo $_SESSION['username'] ?>" >
										<?php $cnt=$cnt+1; }} ?>