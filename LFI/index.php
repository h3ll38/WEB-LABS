<!DOCTYPE html>
<html>

<head>
    <title>LFI vulnerability</title>
    <style>
        h3 {
            position: fixed;
            left: 650px;
            top: 300px;
            color: DeepPink;
        }
        
        #one {
            position: relative;
            left: 0px;
            top: 180px;
            width: 492px;
            height: 280px;
            background-image: url("one.gif");
        }
        
        #two {
            position: relative;
            left: 500px;
            top: -100px;
            width: 492px;
            height: 280px;
            background-image: url("two.gif");
        }
        
        #three {
            position: relative;
            left: 1000px;
            top: -380px;
            width: 492px;
            height: 280px;
            background-image: url("three.gif");
        }
        
        #in1 {
            font-family: "Georgia";
        }
        
        ul {
            list-style-image: url('love.png');
        }
        
        h2 {
            font-family: "Courier New";
            color: hotpink;
        }
        
        form {
            text-align: center;
        }
        
        body {
            background-color: lightblue;
        }
    </style>
</head>

<body>
    <form method="GET" action="">
        <h2>input keyword:</h2>
        <input type="text" name="page">
        <input id="in1" type="submit" value="Find">
        <ul>
            <li>Name</li>
            <li>Age</li>
            <li>Hobby</li>
            <li>Timeline</li>
            <li>Girlfriend</li>
            <li>Boyfriend</li>
        </ul>
        <div id="one"></div>
        <div id="two"></div>
        <div id="three"></div>
    </form>
</body>

</html>
<!-- Filter ../ and something -->
<?php
ini_set( "display_errors", 0); 
if(isset($_GET['page']));
{
	$page=$_GET['page'];
	$page= str_replace("..././", "", $page);
	$page= str_replace("../", "", $page);
	if ($page == "Name")
	{
		echo "<h3>Name: Nguyen Dang Khai</h3>";
	}
	if ($page == "Age")
	{
		echo "<h3>Age: 20 years old</h3>";
	}
	if ($page == "Hobby")
	{
		echo "<h3>Hobby: Reading books,computer,...</h3>";
	}
	if ($page == "Timeline")
	{
		echo "<h3>Timeline: Now,become super Nắc cơ !!!</h3>";
	}
	if ($page == "Girlfriend")
	{
		echo "<h3>Girlfriend: MiuLe,HienHo,DieuNhi,...</h3>";
	}
	if ($page == "Boyfriend")
	{
		echo "<h3>Boyfriend: Finding</h3>";
	}
	include($page);
}
if(!isset($_GET['page']));
{
	die();
}
?>
