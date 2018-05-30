<?php 
$mysqli = new mysqli("localhost", "liliumde_admin", "jMK}X&Y,Q4uo", "liliumde_rent");

$query="SELECT VehiclesTitle, VehiclesBrand, PricePerDay, FuelType, ModelYear, SeatingCapacity, Vimage1 FROM tblvehicles"; 
$result=$mysqli->query($query)
	or die ($mysqli->error);

$response = array();

$podaci = array();
while($row=$result->fetch_assoc()) 
{ 
$naslov=$row['VehiclesTitle']; 
$brend=$row['VehiclesBrand']; 
$cijena=$row['PricePerDay']; 
$gorivo=$row['FuelType']; 
$godiste=$row['ModelYear']; 
$brojSjedista=$row['SeatingCapacity']; 
$slika=$row['Vimage1']; 
//each item from the rows go in their respective vars and into the posts array
$podaci[] = array('VehiclesTitle'=> $naslov, 'VehiclesBrand'=> $brend, 'PricePerDay'=> $cijena, 'FuelType'=> $gorivo, 'ModelYear'=> $godiste, 'SeatingCapacity'=> $brojSjedista, 'Vimage1'=> $slika); 
} 

$response['podaci'] = $podaci;
//creates the file
$fp = fopen('rezultat.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);

?> 