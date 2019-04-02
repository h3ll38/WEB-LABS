<?php
libxml_disable_entity_loader (false);
$xmlfile = file_get_contents('php://input');
$dom = new DOMDocument();
$dom->loadXML($xmlfile, LIBXML_NOENT | LIBXML_DTDLOAD);
$input = simplexml_import_dom($dom);
$user = $input->username;
$passwd = $input->password;
echo "Success Login with username:". $user . "\n password:" .$passwd;
?>