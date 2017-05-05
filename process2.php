<?php
$myfiles = fopen("studentdetails2.txt","a+") or die("unable to open file");
$myfilet = fopen("teacherdetails.txt","a+") or die("unable to open file");
$myfilef = fopen("studentdetails3.txt","a+") or die("unable to open file");
while(!feof($myfiles))
{
$sturcd = fgets($myfiles);
while(!feof($myfilet))
{
if($sturcd == fgets($myfilet))
{
fwrite($myfilef,"\n");
fwrite($myfilef,$sturcd);
fwrite($myfilef,"|T");
}
/*else{
fwrite($myfilef,"\n");
fwrite($myfilef,$sturcd);
fwrite($myfilef,"|F");
}*/
}
}
fclose($myfiles);
fclose($myfilet);
fclose($myfilef);
?>
