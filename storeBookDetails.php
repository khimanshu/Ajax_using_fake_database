<?php
// Start the session
session_start();
?>
<?php	
	$courseName = $_GET["courseName"];
    $textName = $_GET["textName"];
    $bookPublisher = $_GET["bookPublisher"];
    $bookEdition = $_GET["bookEdition"];
    $bookdate =$_GET["bookdate"];
	
	$current_book_key = count($_SESSION["bookDetails"]) + 1;    
	$_SESSION["bookDetails"][$current_book_key] = array($courseName,$textName,$bookPublisher, $bookEdition,$bookdate);
    
	$myfile = fopen("teacherdetails.csv", "a+") or die("Unable to open file!");
	fputcsv($myfile,array($current_book_key,$courseName,$textName,$bookPublisher,$bookEdition,$bookdate));
	
	echo "The Details are succussfully addedd";
?>