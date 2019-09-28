<?php
define ( "SMARTY_DIR", "/var/www/html/sgm/Smarty/libs/" );
define ( "SITE", "/var/www/html/sgm/" );
define ( "TEMPLATE", "" );
include (SMARTY_DIR . "Smarty.class.php");
$smarty = new Smarty ();
// $smarty->debugging = true;
$smarty->template_dir = SITE . "templates/" . TEMPLATE;
$smarty->compile_dir = SITE . "templates_c/";
// echo "ok";
?>