<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Student</title>
</head>
<body>
<br>
<a href = "home.php"> HOME </a><br>
<center>
<h2>Enter the details of books purchsed for the course</h2><br><br><br>
<form>
Your First Name:
<input type = "text" id = "SfirstName"><br><br>
Your Last Name:
<input type = "text" id = "SlastName"><br><br>
Course Name:
<input type = "text" id = "ScourseName"><br><br>
Book Name:
<input type = "text" id = "StextName"><br><br>
Book Publisher:
<input type = "text" id = "SbookPublisher"><br><br>
Book Edition:
<input type = "text" id = "SbookEdition"><br><br>
Date of Printing:
<input type = "date" id = "SbookDate"><br><br>
<button type = "button" onclick="storeStudentDetails()">Submit</button>
</form>
</center>
<div id="result">
</div>
</body>
</html>
<script>
function storeStudentDetails()
{
var firstName=document.getElementById("SfirstName").value;
var lastName=document.getElementById("SlastName").value;
var courseName=document.getElementById("ScourseName").value;
var textName=document.getElementById("StextName").value;
var bookPublisher=document.getElementById("SbookPublisher").value;
var bookEdition=document.getElementById("SbookEdition").value;
var bookDate=document.getElementById("SbookDate").value;
if(firstName.length>0)
	{
var xhttp=new XMLHttpRequest();
xhttp.open("GET","storeStudentDetails.php?firstName="+firstName+"&lastName="+lastName+"&studentCourseName="+courseName+"&studentTextName="+textName+"&studentBookPublisher="+bookPublisher+"&studentBookEdition="+bookEdition+"&studentBookdate="+bookDate,true);
xhttp.send();
xhttp.onreadystatechange=function(){
if(xhttp.readyState == 4 && xhttp.status == 200)
					{
document.getElementById("result").innerHTML=xhttp.responseText;
					}
				    }
	}
else
document.getElementById("result").innerHTML="Contents not yet entered";

}
</script>

