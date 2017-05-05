<html>
<head>
<title>System Response</title>
</head>
<body>
</body>
<?php
echo "in the server<br>";
$firstName=$_GET["firstName"];
$lastName=$_GET["lastName"];
$scourseName=$_GET["courseName"];
$sbookName=$_GET["textName"];
$sbookPublisher=$_GET["bookPublisher"];
$sbookEdition=$_GET["bookEdition"];
$sbookDate=$_GET["bookDate"];
echo "Recently added<br>";
echo "First Name is $firstName<br>";
echo "Last Name is $lastName<br>";
echo "Course name is $scourseName<br>";
echo "Text name is $sbookName<br>";
echo "book publisher is $sbookPublisher<br>";
echo "book edition is $sbookEdition<br>";
echo "book date is $sbookDate<br>";
echo "<br>";
$myfile = fopen("studentdetails.txt", "a+") or die("Unable to open file!");
fwrite($myfile,$firstName);
fwrite($myfile,"|");
fwrite($myfile,$lastName);
fwrite($myfile,"|");
fwrite($myfile,$scourseName);
fwrite($myfile,"|");
fwrite($myfile,$sbookName);
fwrite($myfile,"|");
fwrite($myfile,$sbookPublisher);
fwrite($myfile,"|");
fwrite($myfile,$sbookEdition);
fwrite($myfile,"|");
fwrite($myfile,$sbookDate);
fwrite($myfile,"|\n");
fclose($myfile);
$myfile2 = fopen("studentdetails2.txt", "a+") or die("Unable to open file!");
fwrite($myfile2,$scourseName);
fwrite($myfile2,"|");
fwrite($myfile2,$sbookName);
fwrite($myfile2,"|");
fwrite($myfile2,$sbookPublisher);
fwrite($myfile2,"|");
fwrite($myfile2,$sbookEdition);
fwrite($myfile2,"|");
fwrite($myfile2,$sbookDate);
fwrite($myfile2,"|\n");
fclose($myfile2);
$myfile = fopen("studentdetails.txt", "a+") or die("Unable to open file!");
echo "All entries till now are<br>";
while(!feof($myfile)) {
echo fgets($myfile);
echo "<br>";
}
fclose($myfile);
?>
</html>

