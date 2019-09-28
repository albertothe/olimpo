<?php
require_once 'Smarty/libs/Smarty.class.php';

$smarty = new Smarty;
$smarty -> cache_dir =    "cache";
$smarty->  config_dir =   "config";
$smarty -> template_dir = "templates";
$smarty -> compile_dir =  "templates_c";

//SE ESTIVER FALSE, TODA REQUISIวรO VAI SER COMPILADA
$smarty->compile_check = false;
//TELA DE DEBUG HABILITADA
$smarty->debugging = false;
?>