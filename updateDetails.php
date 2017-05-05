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
	if($requestFor == "fetchBookDetails"){
		$textBook = $_SESSION["bookDetails"][$_GET["bookId"]];		
		echo"<form>";
		echo"Course Name:";
		echo"<input type = 'text' id = 'TcourseName' value = '$textBook[0]'><br><br>";
		echo"Book Name:";
		echo"<input type = 'text' id = 'TtextName' value = '$textBook[1]'><br><br>";
		echo"Book Publisher:";
		echo"<input type = 'text' id = 'TbookPublisher' value = '$textBook[2]'><br><br>";
		echo"Book Edition:";
		echo"<input type = 'text' id = 'TbookEdition' value = '$textBook[3]'><br><br>";
		echo"Date of Printing:";
		echo"<input type = 'date' id = 'TbookDate' value = '$textBook[4]'><br><br>";
		echo"<button type='button' onclick='updateTextBook()'>Submit</button>";
		echo"</form>";		
	}
	if($requestFor == "fetchstudentDetails"){
		$student = $_SESSION["studentBookDetails"][$_GET["studentId"]];		
		echo"<form>";
		echo"First Name:";
		echo"<input type = 'text' id = 'SfirstName' value = '$student[0]'><br><br>";
		echo"Last Name:";
		echo"<input type = 'text' id = 'SlastName' value = '$student[1]'><br><br>";
		echo"Course Name:";
		echo"<input type = 'text' id = 'ScourseName' value = '$student[2]'><br><br>";
		echo"Book Name:";
		echo"<input type = 'text' id = 'StextName' value = '$student[3]'><br><br>";
		echo"Book Publisher:";
		echo"<input type = 'text' id = 'SbookPublisher' value = '$student[4]'><br><br>";
		echo"Book Edition:";
		echo"<input type = 'text' id = 'SbookEdition' value = '$student[5]'><br><br>";
		echo"Date of Printing:";
		echo"<input type = 'text' id = 'SbookDate' value = '$student[6]'><br><br>";
		echo"<button type='button' onclick='updateStudent()'>Submit</button>";
		echo"</form>";		
	}
	if($requestFor == "updateTextBook"){
		$textBookId = $_GET["bookId"];
		$courseName = $_GET["courseName"];
		$textName = $_GET["textName"];
		$bookPublisher = $_GET["bookPublisher"];
		$bookEdition = $_GET["bookEdition"];
		$bookdate =$_GET["bookdate"];
		
		$_SESSION["bookDetails"][$textBookId] = array($courseName,$textName,$bookPublisher, $bookEdition,$bookdate);
		echo count($_SESSION["bookDetails"]);
		$myfile = fopen("teacherdetails.csv", "w+") or die("Unable to open file!");
		for($i=1;$i<=count($_SESSION["bookDetails"]);$i++){
			$newArray=array($i,$_SESSION["bookDetails"][$i][0],$_SESSION["bookDetails"][$i][1],$_SESSION["bookDetails"][$i][2],$_SESSION["bookDetails"][$i][3],$_SESSION["bookDetails"][$i][4]);
			fputcsv($myfile, $newArray);			
		}		
		fclose($myfile);
		echo "Text Book Details updated!";
	}
	if($requestFor == "updateStudent"){		
		
		print_r ($_SESSION["studentBookDetails"]);
		$studentId = $_GET["studentId"];
		$firstName = $_GET["firstName"];
		$lastName = $_GET["lastName"];
		$studentCourseName = $_GET["studentCourseName"];
		$studentTextName = $_GET["studentTextName"];
		$studentBookPublisher = $_GET["studentBookPublisher"];
		$studentBookEdition = $_GET["studentBookEdition"];
		$studentBookdate =$_GET["studentBookdate"];
		
		$_SESSION["studentBookDetails"][$studentId] = array($firstName,$lastName,$studentCourseName,$studentTextName,$studentBookPublisher, $studentBookEdition,$studentBookdate,"F");
		
		echo"<br><br>";
		print_r ($_SESSION["studentBookDetails"]);
		$myfile = fopen("studentdetails.csv", "w+") or die("Unable to open file!");
		echo count($_SESSION["studentBookDetails"]);
		for($i=1;$i<=count($_SESSION["studentBookDetails"]);$i++){
			$newArray=array($i,$_SESSION["studentBookDetails"][$i][0],$_SESSION["studentBookDetails"][$i][1],$_SESSION["studentBookDetails"][$i][2],$_SESSION["studentBookDetails"][$i][3],$_SESSION["studentBookDetails"][$i][4],$_SESSION["studentBookDetails"][$i][5],$_SESSION["studentBookDetails"][$i][6],"F");
			fputcsv($myfile, $newArray);			
		}		
		fclose($myfile);
		echo "Student Details are updated!";
	}
	
?>
</body>
</html>