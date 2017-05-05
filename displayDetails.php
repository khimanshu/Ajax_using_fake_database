<?php
// Start the session
session_start();
?>
<html>
<head>
</head>
<body>
<?php
	
	$requestFor = $_GET["requestFor"];	
	//array_push($_SESSION["bookDetails"],array($courseName,$textName,$bookPublisher, $bookEdition,$bookdate));
	if($requestFor == "course"){
		$courseNames = array_column($_SESSION["bookDetails"], 0);
		//print_r($courseNames);
		echo "<table>";
		for($i=0; $i<count($courseNames); $i++){
			echo "<tr>";
			echo "<td>" . $courseNames[$i] . "</td>";
			echo "</tr>";
		}
		echo "</table>";		
	}
	if($requestFor == "Textbook"){
		$textBookNames = array_column($_SESSION["bookDetails"], 1);
		//print_r($courseNames);
		echo "<table>";
		for($i=0; $i<count($textBookNames); $i++){
			echo "<tr>";
			echo "<td>" . $textBookNames[$i] . "</td>";
			echo "</tr>";
		}
		echo "</table>";		
	}
	if($requestFor == "students"){
		$firstNames = array_column($_SESSION["studentBookDetails"], 0);
		$lastNames = array_column($_SESSION["studentBookDetails"], 1);		
		echo "<table>";
		for($i=0; $i<count($firstNames); $i++){
			echo "<tr>";
			echo "<td>" . $firstNames[$i] . "</td>";
			echo "<td>" . $lastNames[$i] . "</td>";
			echo "</tr>";
		}
		echo "</table>";		
	}
	if($requestFor =="textBooksofCourse"){
		$courseName = $_GET["courseName"];
		$bookArray = $_SESSION["bookDetails"];				
		$textBookArray = array();
		for($i=1; $i<=count($bookArray); $i++){			
			if($bookArray[$i][0] == $courseName){
				array_push($textBookArray,$bookArray[$i][1]);
			} 
		}		
		if(count($textBookArray) > 0){
			echo"<table>";
			for($j=0; $j<count($textBookArray);$j++){
				echo"<tr>";
				echo"<td>". $textBookArray[$j] . "</td>";
				echo"</tr>";
			}
			echo"</table>";
		}		
	}
	if($requestFor =="studentsofCourse"){
		$courseName = $_GET["courseName"];
		$studentBookArray = $_SESSION["studentBookDetails"];				
		$studentArray = array();
		for($i=1; $i<=count($studentBookArray); $i++){			
			if($studentBookArray[$i][2] == $courseName){
				array_push($studentArray,array($studentBookArray[$i][0],$studentBookArray[$i][1]));
			} 
		}		
		if(count($studentArray) > 0){
			echo"<table>";
			for($j=0; $j<count($studentArray);$j++){
				echo"<tr>";
				echo"<td>". $studentArray[$j][0] . "</td>";
				echo"<td>". $studentArray[$j][1] . "</td>";
				echo"</tr>";
			}
			echo"</table>";
		}		
	}
	if($requestFor == "coursesofStudent"){
		$firstname = $_GET["firstname"];
		$secondname = $_GET["secondName"];
		$studentBookArray = $_SESSION["studentBookDetails"];				
		$courseArray = array();
		for($i=1; $i<=count($studentBookArray); $i++){
			if($studentBookArray[$i][0] == $firstname && $studentBookArray[$i][1] == $secondname){
				array_push($courseArray,$studentBookArray[$i][2]);				
			}
		}
		if(count($courseArray) > 0){
			echo"<table>";
			for($j=0;$j<count($courseArray);$j++){
				echo"<tr>";
				echo"<td>".$courseArray[$j]."</td>";
				echo"<tr>";
			}
			echo"</table>";
		}
		
	}
	if($requestFor == "textbooksofStudent"){
		$firstname = $_GET["firstname"];
		$secondname = $_GET["secondName"];
		$studentBookArray = $_SESSION["studentBookDetails"];				
		$textBookArray = array();
		for($i=1; $i<=count($studentBookArray); $i++){
			if($studentBookArray[$i][0] == $firstname && $studentBookArray[$i][1] == $secondname){
				array_push($textBookArray,array($studentBookArray[$i][3],$studentBookArray[$i][4],$studentBookArray[$i][5],$studentBookArray[$i][6]));				
			}
		}
		if(count($textBookArray) > 0){
			echo "<table border='5'>";
			foreach ($textBookArray as $rows => $row)
			{								
				echo"<tr>";		
				foreach ($row as $col => $cell)
				{
					echo "<td>" . $cell . "</td>";
				}	
				echo "</tr>";				
			}	
			echo"</table>";
		}
		
	}
	if($requestFor == "studentTextStatus"){
		$bookArray = $_SESSION["bookDetails"];
		$studentBookArray = $_SESSION["studentBookDetails"];		
		for($i=1;$i<=count($studentBookArray);$i++){			
			$course = $studentBookArray[$i][2];
			$courseBooks=array();
			//echo $course;
			//echo "<br>";
			for($j=1;$j<=count($bookArray);$j++){
				//echo "inside j loop : <br>";
				//print_r($bookArray[$j][0]);
				//echo "<br>";			
				if(in_array($course,$bookArray[$j])){
					//echo $course . "is in the" . $j . "th array <br>";
					array_push($courseBooks,$bookArray[$j]);
					//echo "couse book after a push";
					//print_r($courseBooks);
					//echo "<br>";
					//echo"Course book Array in push for i:".$i." <br>";
					//print_r($courseBooks);
					//echo "<br>";
				}
			}
			if(count($courseBooks)> 0){
				//echo"Course book is more that 0 <br>";
				for($k=0; $k < count($courseBooks);$k++){
					//echo $k ." th element is course book array is: <br>";
					//print_r($courseBooks[$k]);
					//echo "<br>";
					//echo $i . " th element is studentBookArray is : <br>";
					//print_r($studentBookArray[$i]);
					//echo "<br>";
					//echo "the difference count is : <br>";
					//echo count((array_diff($studentBookArray[$i],$courseBooks[$k])));
					//echo "<br>";
					if(count(array_diff($studentBookArray[$i],$courseBooks[$k])) == 3){
						$studentBookArray[$i][7] = "T";
						//echo "diff is equal to 3 <br>";
						//echo "student details after changing value is : <br>";
						//print_r($studentBookArray[$i]);
						//echo"<br>";
					}		
				}
			}
		}
		for($i=1;$i<=count($studentBookArray);$i++){
			echo "<table border='5'>";
			//print_r($studentBookArray[$i]);
			if($studentBookArray[$i][7] == "F"){
				echo"<tr bgcolor='red'>";
			}
			else{
				echo"<tr bgcolor='green'>";
			}
			foreach ($studentBookArray[$i] as $col => $cell)
			{
				echo "<td>" . $cell . "</td>";
			}	
			echo "</tr>";
			echo"</table>";
				
		}				
	}
?>
</body>
</html>