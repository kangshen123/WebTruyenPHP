<?php 
require("../../model/database.php");
require("../../model/taikhoan.php");
$TaiKhoan = new TAIKHOAN();
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="null"; 
}


switch($action){
    case "null":
        $tk = $TaiKhoan->laydulieu();
        include("main.php");
        break;
    case "them":
        include("add.php");
        break;
    case "xulythem":
        //Xu ly pass
        $password = password_hash($_POST['MatKhau'], PASSWORD_DEFAULT);
        //Xu ly hinh anh:
        $hinhanh = "images/Avatar/" . basename($_FILES["HinhAnh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
		move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $duongdan);
        //Xu ly them:
        $tkmoi = new TAIKHOAN();
        $tkmoi->setten($_POST["HoVaTen"]);
        $tkmoi->setemail($_POST["Email"]);
        $tkmoi->sethinhanh($hinhanh);
        $tkmoi->settendangnhap($_POST["TenDangNhap"]);
        $tkmoi->setmatkhau($password);
        $tkmoi->setquyenhan(0);
        // thêm
        $TaiKhoan->them($tkmoi);
        // load danh sách
        $tk = $TaiKhoan->laydulieu();       
        include("main.php");
        break; 
    case "sua":
        $tk = $TaiKhoan->laydulieutheoid($_GET["id"]);
        include("add.php");
        break;
    case "capnhat":
        //Xu ly pass
        $password = password_hash($_POST['MatKhau'], PASSWORD_DEFAULT);
        //Xu ly hinh anh:
        $hinhanh = "images/Avatar/" . basename($_FILES["HinhAnh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
		move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $duongdan);
        //Xu ly them:
        $tkmoi = new TAIKHOAN();
        $tkmoi->setid($_GET["id"]);
        $tkmoi->setten($_POST["HoVaTen"]);
        $tkmoi->setemail($_POST["Email"]);
        $tkmoi->sethinhanh($hinhanh);
        $tkmoi->settendangnhap($_POST["TenDangNhap"]);
        $tkmoi->setmatkhau($password);
        $tkmoi->setquyenhan(0);
    	// sửa
    	$TaiKhoan->sua($tkmoi);
    	// load danh sách
        $tk = $TaiKhoan->laydulieu();       
        include("main.php");
        break;
    case "xoa":
        if(isset($_GET["id"])){
            $tkxoa = new TAIKHOAN();        
            $tkxoa->setid($_GET["id"]);
			$TaiKhoan->xoa($tkxoa);
        }	
        $tk = $TaiKhoan->laydulieu();       
        include("main.php");
        break;
    default:
        break;
    }  
?>

