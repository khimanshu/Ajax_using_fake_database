<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Store Text Book Details</title>
</head>
<body>
<br>
<a href = "home.php"> HOME </a>
<br>
<center>
<h2>Enter the details of course and the books that the students need to buy for the course</h2><br><br>
<form>
Course Name:
<input type = "text" id = "TcourseName"><br><br>
Book Name:
<input type = "text" id = "TtextName"><br><br>
Book Publisher:
<input type = "text" id = "TbookPublisher"><br><br>
Book Edition:
<input type = "text" id = "TbookEdition"><br><br>
Date of Printing:
<input type = "date" id = "TbookDate"><br><br>
<button type="button" onclick="storeTextBook()">Submit</button>
</form>
<p id="result">
</p>
</center>
</body>
</html>
<script>
function storeTextBook()
{
var courseName=document.getElementById("TcourseName").value;
var textName=document.getElementById("TtextName").value;
var bookPublisher=document.getElementById("TbookPublisher").value;
var bookEdition=document.getElementById("TbookEdition").value;
var bookdate=document.getElementById("TbookDate").value;

if(courseName.length>0)
	{
var xhttp=new XMLHttpRequest();
xhttp.open("GET","storeBookDetails.php?courseName="+courseName+"&textName="+textName+"&bookPublisher="+bookPublisher+"&bookEdition="+bookEdition+
"&bookdate="+bookdate,true);
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

