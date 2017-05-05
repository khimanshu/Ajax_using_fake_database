<html>
<body>
<?php
$courseName = $_GET["courseName"];
$textName = $_GET["textName"];
$bookPublisher = $_GET["bookPublisher"];
$bookEdition = $_GET["bookEdition"];
$bookdate =$_GET["bookdate"];
echo "Recently added<br>";
echo "Course name is $courseName<br>";
echo "Text name is $textName<br>";
echo "book publisher is $bookPublisher<br>";
echo "book edition is $bookEdition<br>";
echo "book date is $bookdate<br>";
echo "<br>";
$myfile = fopen("teacherdetails.txt", "a+") or die("Unable to open file!");
fwrite($myfile,$courseName);
fwrite($myfile,"|");
fwrite($myfile,$textName);
fwrite($myfile,"|");
fwrite($myfile,$bookPublisher);
fwrite($myfile,"|");
fwrite($myfile,$bookEdition);
fwrite($myfile,"|");
fwrite($myfile,$bookdate);
fwrite($myfile,"|\n");
fclose($myfile);
$myfile = fopen("teacherdetails.txt", "a+") or die("Unable to open file!");
echo "All entries till now are<br>";
while(!feof($myfile)) {
echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>
</html>
