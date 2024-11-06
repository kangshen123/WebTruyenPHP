<?php 
require("../model/database.php");
require("../model/theloai.php");

$TheLoai = new THELOAI();
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}


switch($action){
    case "null":
        $tl = $TheLoai->laytheloai(); 	
        include("main.php");
        break;
    }

?>

