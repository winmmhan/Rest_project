<?php
include('includes/newconfig.php');
include('includes/database.php');

$database = new Database();

//if($database) {echo 'true';}


$startTime = time();
$endTime = $startTime -(5 * 60);

echo '<br/>' . $endTime;

//$edTime = new DateTime("@$endTime");
//echo '<br/>' . $edTime->format('Y-m-d H:i:s') . '<br/>';


while($startTime >= $endTime ){
    
//    echo '<br/>' .$startTime . ' ' ;
//     $stTime = new DateTime("@$startTime");   
//     echo  ' '.  $stTime->format('Y-m-d H:i:s') . '<br/>';
    
    $cpuload = getRandFloat(0,100);
    $concurrency=rand(0,500000);

    $timeArray = array();    
        
    $sql = "INSERT INTO datapoints ('id', 'timestamp', 'cpu_load', 'concurrency')"; 
    $sql .= "VALUES ('','".$startTime."','".$cpuload."','".$concurrency."')";
        
    $database->query($sql);
     
    $startTime = $startTime - 1;
    
}

//var_dump($myArray);

function getRandFloat($Min, $Max){
	//validate input
	if ($Min>$Max) { $min=$Max; $max=$Min; }
        else { $min=$Min; $max=$Max; }
	$randomfloat = $min + mt_rand() / mt_getrandmax() * ($max - $min);

	return $randomfloat;
}


?>
