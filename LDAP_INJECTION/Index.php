<!DOCTYPE html>
<html>
<head>
	<title>LDAP injection</title>
</head>
<body>
<form method="POST" action="index.php">
Username:	
<input type="text" name="user">
Password:
<input type="password" name="pass">
<input type="submit" value="FIND">	
</form>
</body>
</html>


<?php
$ldap_dn = "cn=read-only-admin,dc=example,dc=com";
$ldap_conn = ldap_connect("54.196.176.103",389);
$ldap_passwd = "password";
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION,3);

if(@ldap_bind($ldap_conn,$ldap_dn,$ldap_passwd)){
	$filter = "(&(cn=".$_POST['user'].")(userPassword=".$_POST['pass']."))"; // focus
	echo $filter;
	$rel = ldap_search($ldap_conn, "dc=example,dc=com", $filter); 
	$entries = ldap_get_entries($ldap_conn, $rel);
	for ($i = 0 ; $i < $entries["count"]; $i++){
			echo "Surname is : ".@$entries[$i]["sn"][0]."<br/>";
			echo "Mail is : ".@$entries[$i]["mail"][0]."<br/>";
			echo "Password is : ".@$entries[$i]["userpassword"][0]."<br/>";
			echo "===============================================<br/>";
		}
}
else{
	echo "<h1>";
	echo "Error Configure!!";
	echo "</h1>";
}
?>
