<!DOCTYPE html>
<html>
<head>
	<title>VULNERABLE UPLOAD FILE</title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
<font color="#F00000">Choose file</font>
	<input type="file" name="fileup">
	<input type="submit" name="upload" value="upload">
</form>
</body>
</html>
<?php
if (isset($_FILES['fileup']))
{
	$filename =$_FILES['fileup']['name'];
	$tmpfile  =$_FILES['fileup']['tmp_name'];
	$sizefile =$_FILES['fileup']['size'];
	$errorfile=$_FILES['fileup']['error'];		
	$whitelist = range(1, 24);
	if (in_array($filename,$whitelist)) /// vul is whitelist,you can bypass with fisrt letter range to 1 from 24
	{
		move_uploaded_file($tmpfile, 'upload/'.$filename);
		echo "Done Upload!!!";
	}
	else
		echo "Fail upload!!!";
}
else
	die();
?>
