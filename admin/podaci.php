
           
           
           
           <?php

$DBhost = "localhost";
 $DBuser = "liliumde_admin";
 $DBpass = "jMK}X&Y,Q4uo";
 $DBname = "liliumde_rent";
 
 try{
  
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 }catch(PDOException $ex){
  
  die($ex->getMessage());
 }
 
 $query = "SELECT * FROM tblvehicles WHERE privilegija = 'admin'";
 
 $stmt = $DBcon->prepare($query);
 $stmt->execute();
 
 $userData = array();
 
 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  
  $userData[] = array("id"=>$row['id'],"VehiclesTitle"=>$row['VehiclesTitle'], "VehiclesBrand"=>$row['VehiclesBrand'], "PricePerDay"=>$row['PricePerDay'], "FuelType"=>$row['FuelType'], "ModelYear"=>$row['ModelYear'], "SeatingCapacity"=>$row['SeatingCapacity'], "Vimage1"=>$row['Vimage1']);
  
  
 }
 
 echo json_encode($userData);
 
?>




