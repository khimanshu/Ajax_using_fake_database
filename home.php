<?php
// Start the session
session_start();
?>

<?php
// Set the arrays as session variables
$_SESSION["bookDetails"] = array();
$_SESSION["studentBookDetails"] = array();
//echo "Session variables are set.";
//print_r($_SESSION);
$myfile = fopen("teacherdetails.csv", "r") or die("Unable to open file!");
while (($line = fgetcsv($myfile)) !== FALSE) {
  //print_r($line);
  $key = array_shift($line);
  $_SESSION["bookDetails"][$key]=$line;
  echo count($_SESSION["bookDetails"]);
  //print_r($_SESSION["bookDetails"]);
}
$myfile = fopen("studentdetails.csv", "r") or die("Unable to open file!");
while (($line = fgetcsv($myfile)) !== FALSE) {
  $key = array_shift($line);
  $_SESSION["studentBookDetails"][$key] = $line;
  echo count($_SESSION["studentBookDetails"]);
  //print_r($_SESSION["studentBookDetails"]);
}
?>
<html>
<style>
h2{text-align:center;}

.left-div {
    float: left;
    margin: 0 0 10px 10px;
	width: 250px;
	height: 100%;
}

.right-div {
    float: right;
    margin: 0 0 10px 10px;
	width: 250px;
	height: 100%;
}
</style>
<head>
	<h2><title>The Not-so-Great Fake-A-Database AJAX Project</title></h2>
</head>
<body>
<div class = 'left-div'>
<form>
<br><br><br>
<button type="button" onclick="displayStudentTextStatus()">Student Text Book Details</button><br><br><br><br>
<button type="button" onclick="displayCourse()">All Courses</button><br><br>
<button type="button" onclick="displayTextBook()">All Text Books</button><br><br>
<button type="button" onclick="displayStudents()">All Students</button><br><br>
<table border = '2'>
<tr>
<td>
Enter the course Name:<br>
<input type = "text" id = "courseNamebox"><br><br>
<button type="button" onclick="getTextBooksofCourse()">Get Text Books</button><br><br>
<button type="button" onclick="getStudentsofCourse()">Get Students Names</button>
</td></tr></table>
<br><br>
<table border = '2'>
<tr>
<td>
Enter the Student's Name:<br>
First Name:<br>
<input type = "text" id = "firstNamebox"><br>
Second Name:<br>
<input type = "text" id = "secondNamebox"><br><br>
<button type="button" onclick="getCoursesforStudent()">Get Courses</button><br><br>
<button type="button" onclick="getTextBooksforStudent()">Get Text Books</button>
</td></tr></table>
</form>
</div>
<div class = 'right-div'>
<form>
<br><br><br>
<input type = "button" value="Enter Book Details" onclick="location.href='teacher.php'" ><br><br><br>
<input type = "button" value = "Enter Student Details" onclick="location.href='student.php'"><br><br><br>
<input type = "button" value="Update Book Details" onclick="location.href='updateBookDetails.php'" ><br><br><br>
<input type = "button" value = "Update Student Details" onclick="location.href='updatestudent.php'">
</form>
</div>
	<p><h2>The Not-so-Great Fake-A-Database AJAX Project</h2><br></p>
<div id="result">
</div>
</body>
</html>
<script>
function displayCourse()
{
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","displayDetails.php?requestFor=course",true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
}
function displayTextBook()
{
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","displayDetails.php?requestFor=Textbook",true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
}
function displayStudents()
{
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","displayDetails.php?requestFor=students",true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
}
function getTextBooksofCourse()
{
	var courseName=document.getElementById("courseNamebox").value;
	if(courseName.length>0)
	{
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","displayDetails.php?requestFor=textBooksofCourse&courseName="+courseName,true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
	}
}
function getStudentsofCourse()
{
	var courseName=document.getElementById("courseNamebox").value;
	if(courseName.length>0)
	{
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","displayDetails.php?requestFor=studentsofCourse&courseName="+courseName,true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
	}
}
function getCoursesforStudent()
{
	var firstName=document.getElementById("firstNamebox").value;
	var secondName=document.getElementById("secondNamebox").value;
	if(firstName.length>0 && secondName.length>0)
	{
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","displayDetails.php?requestFor=coursesofStudent&firstname="+firstName+"&secondName="+secondName,true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
	}
}
function getTextBooksforStudent()
{
	var firstName=document.getElementById("firstNamebox").value;
	var secondName=document.getElementById("secondNamebox").value;
	if(firstName.length>0 && secondName.length>0)
	{
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","displayDetails.php?requestFor=textbooksofStudent&firstname="+firstName+"&secondName="+secondName,true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
	}
}
function displayStudentTextStatus()
{
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","displayDetails.php?requestFor=studentTextStatus",true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
}
</script>
