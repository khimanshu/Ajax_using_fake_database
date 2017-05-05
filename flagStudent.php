<?php
// Start the session
session_start();
?>
<?php

//print_r($_SESSION);
$bookArray = $_SESSION["bookDetails"];
$studentBookArray = $_SESSION["studentBookDetails"];

for($i=0; $i < count($studentBookArray); $i++){
	
	$course = $studentBookArray[$i][2];
	$courseBooks=array();
	//echo $course;
	for($j=0; $j < count($bookArray); $j++ ){
		if(in_array($course,$bookArray[$j])){
			array_push($courseBooks,$bookArray[$j]);
		}
	}
	if(count($courseBooks)> 0){
		for($k=0; $k < count($courseBooks); $k++){
			if(!(count(array_diff($studentBookArray[$i],$courseBooks[$k])) > 3)){
				$studentBookArray[$i][7] = "T";
			}
			/*else{
				$studentBookArray[$i][7] = "T";
			}*/
		}
	}
}

         
foreach ($studentBookArray as $rows => $row)
{
	echo "<table border='5'>";
	if($row[7] == "F"){
		echo"<tr bgcolor='red'>";
	}
	else{
		echo"<tr bgcolor='green'>";
	}
	//echo"<tr>";
	foreach ($row as $col => $cell)
	{
		echo "<td>" . $cell . "</td>";
	}	
	echo "</tr>";
	echo"</table>";
}	
            


?>