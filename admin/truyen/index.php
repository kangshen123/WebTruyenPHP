<?php 
require("../../model/database.php");
require("../../model/theloai.php");
require("../../model/tacgia.php");
require("../../model/taikhoan.php");
require("../../model/chuong.php");
require("../../model/truyen.php");

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
        $tr = $Truyen->laydulieu(); 	
        include("main.php");
        break;
    case "them":
        $tg = $TacGia->laydulieu();
        $tl= $TheLoai->laydulieu();
        include("add.php");
        break;
    case "xulythem":
        session_start();
        $tacgia = 1;
        $ngayDang = date('Y-m-d');
        if ($_POST["otherAuthor"] != null){
            $tgmoi = new TACGIA();
            $tgmoi->settentacgia($_POST["otherAuthor"]);
            $TacGia->them($tgmoi);
            $tg = $TacGia->laydulieutheoten($_POST["otherAuthor"]);
            $tacgia = $tg["id"];
        } else {
            $tacgia = $_POST["MaTacGia"];
        }
        $hinhanh = "images/PicTruyen/" . basename($_FILES["HinhAnh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
		move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $duongdan);
        //Them
        $trmoi = new TRUYEN();
        $trmoi->settieude($_POST["TieuDe"]);
        $trmoi->settomtat($_POST["TomTat"]);
        $trmoi->setngaydang($ngayDang);
        $trmoi->sethinhanh($hinhanh);
        $trmoi->setidtacgia($tacgia);
        $trmoi->setnguoidang($_SESSION["nguoidung"]["id"]);
        $trmoi->settheloai($_POST["MaTheLoai"]);
        $Truyen->them($trmoi);
        $tr = $Truyen->laydulieu(); 
        $tg = $TacGia->laydulieu();
        $tl= $TheLoai->laydulieu();	
        if ($_SESSION["nguoidung"]["QuyenHan"]==1){
            Header("Location:index.php?action=null");
        }else{
            $id=$_SESSION['nguoidung']['id'];
            Header("Location:index.php?action=truyencuatoi&id=$id");
        }
        
    case "xoa":
        if(isset($_GET["id"])){
            $trxoa = new TRUYEN();        
            $trxoa->setid($_GET["id"]);
			$Truyen->xoa($trxoa);
        }	
        $Chuong->xoatheoidtruyen($_GET["id"]);
        $tr = $Truyen->laydulieu();       
        if ($_SESSION["nguoidung"]["QuyenHan"]==1){
            Header("Location:index.php?action=null");
        }else{
            $id=$_SESSION['nguoidung']['id'];
            Header("Location:index.php?action=truyencuatoi&id=$id");
        }
        break;
    case "duyet":
        $trduyet = new TRUYEN();
        $tt = $_GET["tt"];
        $trduyet->setid($_GET["id"]);
        if ($tt == 1){
            $trduyet->setkiemduyet(0);
        } else {
            $trduyet->setkiemduyet(1);
        }
        $Truyen->duyet($trduyet);
        $tr = $Truyen->laydulieu();       
        include("main.php");
        break;
    case "sua":
        $tr = $Truyen->laydulieutheoid($_GET["id"]);
        $tl = $TheLoai->laydulieu();
        $tg = $TacGia->laydulieu();
        include("add.php");
        break;
    case "xulysua":
        session_start();
        $tacgia = 1;
        $ngayDang = date('Y-m-d');
        if ($_POST["otherAuthor"] != null){
            $tgmoi = new TACGIA();
            $tgmoi->settentacgia($_POST["otherAuthor"]);
            $TacGia->them($tgmoi);
            $tg = $TacGia->laydulieutheoten($_POST["otherAuthor"]);
            $tacgia = $tg["id"];
        } else {
            $tacgia = $_POST["MaTacGia"];
        }
        $hinhanh = "images/PicTruyen/" . basename($_FILES["HinhAnh"]["name"]); // đường dẫn ảnh lưu trong db
		$duongdan = "../../" . $hinhanh; // nơi lưu file upload (đường dẫn tính theo vị trí hiện hành)
		move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $duongdan);
        //Sua
        $trmoi = new TRUYEN();
        $trmoi->setid($_GET["id"]);
        $trmoi->settieude($_POST["TieuDe"]);
        $trmoi->settomtat($_POST["TomTat"]);
        $trmoi->setngaydang($ngayDang);
        $trmoi->sethinhanh($hinhanh);
        $trmoi->setidtacgia($tacgia);
        $trmoi->setnguoidang($_SESSION["nguoidung"]["id"]);
        $trmoi->settheloai($_POST["MaTheLoai"]);
        $Truyen->sua($trmoi);
        $tr = $Truyen->laydulieu(); 
        $tg = $TacGia->laydulieu();
        $tl= $TheLoai->laydulieu();	
        if ($_SESSION["nguoidung"]["QuyenHan"]==1){
            Header("Location:index.php?action=null");
        }else{
            $id=$_SESSION['nguoidung']['id'];
            Header("Location:index.php?action=truyencuatoi&id=$id");
        }
        break;
    case "chitiet":
        $tr = $Truyen->laydulieutheoid($_GET["id"]);
        $ch = $Chuong->laydulieutheoidtruyen($_GET["id"]);
        include("detail.php");
        break;
    case "truyencuatoi":
        $tr = $Truyen->laydulieutheonguoidung($_GET["id"]);
        include("main.php");
        break;
    default:
        break;
}
?>  