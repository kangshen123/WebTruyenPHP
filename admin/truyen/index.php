<?php 
require("../../model/database.php");
require("../../model/theloai.php");
require("../../model/tacgia.php");
require("../../model/taikhoan.php");
require("../../model/truyen.php");

$Truyen = new TRUYEN();
$TheLoai = new THELOAI();
$TacGia = new TACGIA();
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}
switch($action){
    case "null":
        $tr = $Truyen->laydulieu(); 	
        include("main.php");
        break;
    default:
        break;
}
?>  