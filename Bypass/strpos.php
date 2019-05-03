<?php
$str = "<a>3";
if(!strpos($str,"<") || !strpos($str,">"))
{
    echo "sss";
}
else
{
    echo "nnn";
}
?>


===> strpos  returns the numeric position 0,1,2,3 . so 0 = false => if(!false) => true => bypass success
