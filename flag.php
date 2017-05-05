<?php
// Start the session
session_start();
?>
<html>
<head>
<title>Flag List</title>
</head>
<style>
ss{text-align:center;}
</style>
<body>
<a href = "home.php"> HOME </a>
<h2>Student Details</h2><br><br><br>
<form>
<button type = "button" onclick="callme()">Click</button>
</form>
<p id="result">
</p>
</body>
</html>
<script>
function callme()
{
var xhttp=new XMLHttpRequest();
xhttp.open("GET","flagStudent.php",true);
xhttp.send();
xhttp.onreadystatechange=function(){
if(xhttp.readyState == 4 && xhttp.status == 200){
document.getElementById("result").innerHTML=xhttp.responseText;
}
}
}
</script>

