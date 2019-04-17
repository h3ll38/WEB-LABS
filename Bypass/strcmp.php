
<title>TEST STRCMP</title>

<h2>Đời không như mơ! Học một thi mười ! Nhập vào một thứ , trích xuất 1 thứ , so sánh hợp lệ thì sẽ có flag hoy!!!</h2>
<body background="sakura.jpg">
<script src="countdown.js"></script>
<form method="POST" action="">
<h5>Hint:Broken value in array by strcmp like: NULL,character,... </h5>
<h3>4H20pm End!!!</h3>
<h3>insert:</h3><input type="text" name="value"><br>
<h3>extract:</h3><input type="text" name="output">
<input type="submit" name="done" value="Send"><br>

</form>
</body>

<?php
if (isset($_POST['value']) and $_POST['value'] != NULL  and isset($_POST['output']) and $_POST['output'] !=NULL ) {
    $insert  = $_POST['value'];
    $extract = $_POST['output'];
    if ($insert == '""' or $insert == $extract) {
        echo "Sorry!!!";
        die();
    } else {
        $array = array(
            "Nico",
            "licon",
            "MrX",
            "Erik",
            "Roffaxung",
            "ZaoShin",
            "Flag{Y0u_C4n_byp4ss_m4g1c_s3me_strcmp_jUggling!!!}"
        );
        if ($insert != NULL OR $extract != NULL)
            {
            	if ($insert != "0") {
                array_push($array, $insert);
                if (in_array($extract, $array)) {
                    print_r($array);
                } else
                    echo "Sorry!!!";
            }
        	}
        
        if ($insert == "0") {
        	if ($extract != "")
        	{
        		echo "Sorry!!!";
        	}
        	if ($extract == '""')
        	{
            $change = intval($insert);
            array_push($array, $change);
            if (in_array($extract, $array)) {
                print_r($array);
            } else
                echo "Sorry!!!";
             }
        }
    }
}
else
	die();
?>

