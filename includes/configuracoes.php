<?php

define ( "SMARTY_DIR", "c:\\xampp\\htdocs\\olimpo\\Smarty\\libs\\" );
define ( "SITE", "c:\\xampp\\htdocs\\olimpo\\" );
define ( "TEMPLATE", "" );
include (SMARTY_DIR . "Smarty.class.php");
$smarty = new Smarty ();
// $smarty->debugging = true;
$smarty->template_dir = SITE . "templates\\" . TEMPLATE;
$smarty->compile_dir = SITE . "templates_c\\";
// echo "ok";
/*
define ( "SMARTY_DIR", "/var/www/html/olimpo/Smarty/libs/" );
define ( "SITE", "/var/www/html/olimpo/" );
define ( "TEMPLATE", "" );
include (SMARTY_DIR . "Smarty.class.php");
$smarty = new Smarty ();
$smarty->template_dir = SITE . "templates/" . TEMPLATE;
$smarty->compile_dir = SITE . "templates_c/";
*/

?>