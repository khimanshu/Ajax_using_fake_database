<?php
// Start the session
session_start();
?>
<html>
<head>
</head>
<body>
<br>
<a href = "home.php"> HOME </a>
<br>
<form>
Enter the Student ID : 
<input type = "text" id = "studentId"><br><br>
<button type="button" onclick="retrivestudent()">Retive Details</button><br><br>
</form>
<div id="result">
</div>
</body>
</html>
<script>
function retrivestudent()
{
	var studentId=document.getElementById("studentId").value;	
	if(studentId.length>0){
		var xhttp=new XMLHttpRequest();
		xhttp.open("GET","updateDetails.php?requestFor=fetchstudentDetails&studentId="+studentId,true);
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
function updateStudent()
{
	var studentId=document.getElementById("studentId").value;
	var firstName=document.getElementById("SfirstName").value;
	var lastName=document.getElementById("SlastName").value;
	var courseName=document.getElementById("ScourseName").value;
	var textName=document.getElementById("StextName").value;
	var bookPublisher=document.getElementById("SbookPublisher").value;
	var bookEdition=document.getElementById("SbookEdition").value;
	var bookDate=document.getElementById("SbookDate").value;
	
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","updateDetails.php?requestFor=updateStudent&studentId="+studentId+"&firstName="+firstName+"&lastName="+lastName+"&studentCourseName="+courseName+"&studentTextName="+textName+"&studentBookPublisher="+bookPublisher+"&studentBookEdition="+bookEdition+"&studentBookdate="+bookDate,true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
}	
</script>