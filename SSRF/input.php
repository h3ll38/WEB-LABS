<form method="GET" action="test2.php">
<input type="text" name="water"><br>
<input type="submit" name="done"><br>
</form>

<?php
if (isset($_GET['water']));

$url =$_GET['water'];

$image=fopen($url,'rb');

header("Content-Type : image/jpeg");

fpassthru($image);
?>
