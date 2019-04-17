<!doctype html>
<html>
<body>
<form method="POST" action="login.php">
<input type="text" name="USER"><br>
<input type="text" name="PASS"><br>
<input type="submit" name="Login" value="login">

<?php
{
$host="localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";
if ($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);
    $user=$_POST["USER"];
    $pass=$_POST["PASS"];
    $sql = "SELECT * FROM username WHERE user='.$user.' and pass='.$pass.'";
        if ($conn -> connect_error)
        {
          die("connection failed");
        }
   $row = mysql_query($sql);
   $check= mysqli_num_rows($row);
        if($check == 1)
        {
            session_start();
            $_SESSION['userid']= $row['user'];
            $_SESSION['passwd']= $row['pass'];
        }
        else {
           echo 'Incorect pw!!!';
        }

   }
}

?>
</body>
</html>
