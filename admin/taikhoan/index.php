<?php 
require("../../model/database.php");
require("../../model/taikhoan.php");
require("../../model/theloai.php");
require("../../model/truyen.php");
$TaiKhoan = new TAIKHOAN();
$TheLoai = new THELOAI();
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
        if ($_POST["MatKhau"] != $_POST["XacNhanMatKhau"]){       
            include("error.php");
            break; 
        } 
        $password = md5($_POST["MatKhau"]);
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
        Header("Location:index.php?action=null");
        break; 
    case "sua":
        $tk = $TaiKhoan->laydulieutheoid($_GET["id"]);
        include("add.php");
        break;
    case "capnhat":
        //Xu ly pass
        $password = md5($_POST["MatKhau"]);
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
        $tkmoi->setquyenhan($_POST["role"]);
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
    case "duyet":
        $tkkh = new TAIKHOAN();
        $tt = $_GET["tt"];
        $tkkh->setid($_GET["id"]);
        if ($tt == 1){
            $tkkh->setkichhoat(0);
        } else {
            $tkkh->setkichhoat(1);
        }
        $TaiKhoan->duyet($tkkh);
        $tk = $TaiKhoan->laydulieu();       
        include("main.php");
        break;
    case "dangki":
        include("dangki.php");
        break;
    case "dangnhap":
        $error="";
        include("dangnhap.php");
        break;
    case "xulydangnhap":
        $tendn = $_POST["TenDangNhap"];
        $password = md5($_POST["MatKhau"]);
        if($TaiKhoan->kiemtranguoidunghople($tendn,$password)==TRUE){
            $_SESSION["nguoidung"] = $TaiKhoan->laythongtinnguoidung($tendn); // đặt biến session
            $tl = $TheLoai->laydulieu(); 
            $error = "";
            $action="null";
            header ("Location:../../view/index.php");
        }
        else{
            $error = "Tài khoản hoặc mật khẩu không chính xác";
            include("dangnhap.php");
        }
        break;
    default:
        break;
    }  
?>

