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
Enter the Book ID : 
<input type = "text" id = "bookId"><br><br>
<button type="button" onclick="retriveTextBook()">Retive Details</button><br><br>
</form>
<div id="result">
</div>
</body>
</html>
<script>
function retriveTextBook()
{
	var textBookId=document.getElementById("bookId").value;	
	if(textBookId.length>0){
		var xhttp=new XMLHttpRequest();
		xhttp.open("GET","updateDetails.php?requestFor=fetchBookDetails&bookId="+textBookId,true);
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
function updateTextBook()
{
	var textBookId=document.getElementById("bookId").value;
	var courseName=document.getElementById("TcourseName").value;
	var textName=document.getElementById("TtextName").value;
	var bookPublisher=document.getElementById("TbookPublisher").value;
	var bookEdition=document.getElementById("TbookEdition").value;
	var bookdate=document.getElementById("TbookDate").value;
	
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","updateDetails.php?requestFor=updateTextBook&bookId="+textBookId+"&courseName="+courseName+"&textName="+textName+"&bookPublisher="+bookPublisher+"&bookEdition="+bookEdition+"&bookdate="+bookdate,true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200)
		{
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
}	
</script>