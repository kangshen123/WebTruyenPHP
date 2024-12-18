<?php 
require("../../model/database.php");
require("../../model/theloai.php");

$TheLoai = new THELOAI();
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}


switch($action){
    case "null":
        $tl = $TheLoai->laydulieu(); 	
        include("main.php");
        break;
    case "them":
        include("add.php");
        break;
    case "xulythem":
        // gán dữ liệu từ form
        $tlmoi = new THELOAI();
        $tlmoi->settentheloai($_POST["TenTheLoai"]);
        // thêm
        $TheLoai->them($tlmoi);
        // load danh sách
        $tl = $TheLoai->laydulieu();       
        Header("Location:index.php?action=null");
        break; 
    case "xoa":
        // lấy dòng muốn xóa
    	$tlxoa = new THELOAI();
    	$tlxoa->setid($_GET["id"]);
    	// xóa
    	$TheLoai->xoa($tlxoa);
    	// load danh sách
        $tl = $TheLoai->laydulieu();       
        include("main.php");
        break;
    case "sua":
        $idsua = $_GET["id"];
        $tl = $TheLoai->laydulieutheoid($idsua);
        include("add.php");
        break;
    case "capnhat":
        // gán dữ liệu từ form
    	$tlmoi = new THELOAI();
    	$tlmoi->setid($_GET["id"]);
    	$tlmoi->settentheloai($_POST["TenTheLoai"]);
    	// sửa
    	$TheLoai->sua($tlmoi);
    	// load danh sách
        $tl = $TheLoai->laydulieu();       
        include("main.php");
        break;
    default:
        break;
    }  
?>

