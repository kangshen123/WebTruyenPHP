<?php 
require("../../model/database.php");
require("../../model/tacgia.php");

$TacGia = new TACGIA();
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}


switch($action){
    case "null":
        $tg = $TacGia->laydulieu(); 	
        include("main.php");
        break;
    case "them":
        include("add.php");
        break;
    case "xulythem":
        // gán dữ liệu từ form
        $tgmoi = new TACGIA();
        $tgmoi->settentacgia($_POST["TenTacGia"]);
        // thêm
        $TacGia->them($tgmoi);
        // load danh sách
        $tg = $TacGia->laydulieu();       
        Header("Location:index.php?action=null");
        break; 
    case "xoa":
        // lấy dòng muốn xóa
    	$tgxoa = new TACGIA();
    	$tgxoa->setid($_GET["id"]);
    	// xóa
    	$TacGia->xoa($tgxoa);
    	// load danh sách
        $tg = $TacGia->laydulieu();       
        include("main.php");
        break;
    case "sua":
        $idsua = $_GET["id"];
        $tg = $TacGia->laydulieutheoid($idsua);
        include("add.php");
        break;
    case "capnhat":
        // gán dữ liệu từ form
    	$tgmoi = new TACGIA();
    	$tgmoi->setid($_GET["id"]);
    	$tgmoi->settentacgia($_POST["TenTacGia"]);
    	// sửa
    	$TacGia->sua($tgmoi);
    	// load danh sách
        $tg = $TacGia->laydulieu();       
        include("main.php");
        break;
    default:
        break;
    }  
?>

