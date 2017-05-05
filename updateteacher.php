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
<button type="button" onclick="retriveTextBook()">Retive Details</button>
<div id="result">
</div>	
</form>
</body>
</html>
<script>
function retriveTextBook()
{
var textBookId=document.getElementById("bookId").value;
if(textBookId.length>0){	
	var xhttp=new XMLHttpRequest();
	xhttp.open("GET","updateDetails.php?requestfor=fetchbook&bookId="+textBookId,true);
	xhttp.send();
	xhttp.onreadystatechange=function(){
		if(xhttp.readyState == 4 && xhttp.status == 200){
			document.getElementById("result").innerHTML=xhttp.responseText;
		}
	}
}
else
document.getElementById("result").innerHTML="Contents not yet entered";
}
</script>