<?php 
require("../model/database.php");
require("../model/theloai.php");
require("../model/tacgia.php");
require("../model/taikhoan.php");
require("../model/chuong.php");
require("../model/truyen.php");

$Truyen = new TRUYEN();
$TheLoai = new THELOAI();
$TacGia = new TACGIA();
$TaiKhoan = new TAIKHOAN();
$Chuong = new CHUONG();
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}
switch($action){
    case "null":
        $tl = $TheLoai->laydulieu(); 
        $tr = $Truyen->laydulieu(); 	
        include("main.php");
        break;
    case "loc":
        $tr = $Truyen->laydulieutheotheloai($_GET["id"]);
        $tl = $TheLoai->laydulieu(); 
        include("main.php");
        break;
    default:
        break;
    }
?>

