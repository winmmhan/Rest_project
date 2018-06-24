<?php
include('includes/newconfig.php');
include('includes/database.php');

global $database;

$startTime = time();
$endTime = $startTime -(5 * 60);
echo '<br/>' . $endTime;

//Create Array for each timestamp 5 minutes backwards
$timeArray = array();
while($startTime >= $endTime ){
    
	    $cpuload =round(getRandFloat(0,100));
	    $concurrency=rand(0,500000);

	    $timeArray[]  = array(
		"timestamp"=>$startTime,
		"cpuload"=>$cpuload,
		"concurrency"=>$concurrency,       
	    ); 
	
	 $startTime = $startTime - 1;
   }       


foreach($timeArray as $arr){
         
	$timestamp = $arr['timestamp'];
	$cpuload = $arr['cpuload'];
	$con = $arr['concurrency'];

	$sql = "INSERT INTO datapoints (id, timestamp, cpu_load, concurrency) VALUES "; 
        $sql .= "('', '".$timestamp."', '".$cpuload."', '".$con."')"; 
		
	$database->query($sql);
 }         


// Generate Random Float number
function getRandFloat($Min, $Max){
	//validate input
	if ($Min>$Max) { $min=$Max; $max=$Min; }
        else { $min=$Min; $max=$Max; }
	$randomfloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);

	return $randomfloat;
}


?>
