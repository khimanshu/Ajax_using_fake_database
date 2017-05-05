<?php
// Start the session
session_start();
?>
<?php	
	$firstName = $_GET["firstName"];
    $lastName = $_GET["lastName"];
    $studentCourseName = $_GET["studentCourseName"];
    $studentTextName = $_GET["studentTextName"];
    $studentBookPublisher = $_GET["studentBookPublisher"];
    $studentBookEdition = $_GET["studentBookEdition"];
    $studentBookdate =$_GET["studentBookdate"];

    $current_student_key = count($_SESSION["studentBookDetails"]) + 1;
	$_SESSION["studentBookDetails"][$current_student_key] = array($firstName,$lastName,$studentCourseName,$studentTextName,$studentBookPublisher, $studentBookEdition,$studentBookdate,"F"); 
    	
	$myfile = fopen("studentdetails.csv", "a+") or die("Unable to open file!");
	fputcsv($myfile,array($current_student_key,$firstName,$lastName,$studentCourseName,$studentTextName,$studentBookPublisher, $studentBookEdition,$studentBookdate,"F"));
	echo "The Details are succussfully addedd";

?>