<?php
session_start();
require "includes/constants.php";
require "includes/dbConnection.php";
require "lang/en.php";

// Class Auto Load
function ClassAutoload($ClassName){
   $directories = ["forms", "processes", "structure", "tables", "global", "store"];

   foreach($directories AS $dir){
        $FileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir .  DIRECTORY_SEPARATOR . $ClassName . '.php';
        
        if(file_exists($FileName) AND is_readable($FileName)){
         require $FileName;
        }
   }
}
spl_autoload_register('ClassAutoload');

$ObjGlob = new fncs();
$ObjSendMail = new SendMail();

// Creating instances of all classes
    $ObjLayouts = new layouts();
    $ObjMenus = new menus();
    $ObjContents = new contents();
    $Objforms = new forms();
    $conn = new dbConnection(DB_TYPE, HOST_NAME, DB_PORT, HOST_USER, HOST_PASS, DB_NAME);

// Create process instances

$ObjAuth = new auth();
$ObjAuth->signup($conn, $ObjGlob, $ObjSendMail, $lang, $conf);
$ObjAuth->verify_code($conn, $ObjGlob, $ObjSendMail, $lang, $conf);