<?php 
require("../../model/database.php");
require("../../model/theloai.php");
require("../../model/tacgia.php");
require("../../model/taikhoan.php");
require("../../model/truyen.php");
require("../../model/chuong.php");
#
error_reporting(E_ALL & ~E_NOTICE);  // Tắt chỉ lỗi 'Notice'
ini_set('display_errors', 0);
#
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
        $ch = $Chuong->laydulieu(); 	
        include("main.php");
        break;
    case "them": 
        session_start();
        if ($_SESSION["nguoidung"]["QuyenHan"]==1){
            $tr = $Truyen->laydulieu();
        }else{
            $tr = $Truyen->laydulieutheonguoidung($_SESSION["nguoidung"]["id"]);
        }
        include("add.php");
        break;     
    case "xulythem":
        session_start();
        $ngayDang = date('Y-m-d');
        //Them
        $chmoi = new CHUONG();
        $chmoi->settieude($_POST["TieuDe"]);
        $chmoi->setnoidung($_POST["NoiDung"]);
        $chmoi->setngaydang($ngayDang);
        $chmoi->setidtruyen($_POST["MaTruyen"]);
        $chmoi->setnguoidang($_SESSION["nguoidung"]["id"]);
        $Chuong->them($chmoi);
        $trsc = $Truyen->laydulieutheoid($_POST["MaTruyen"]);
        $sc = $trsc["SoChuong"]+1;
        $Truyen->dieuchinhchuong($_POST["MaTruyen"],$sc);
        $tr = $Truyen->laydulieu(); 
        $tg = $TacGia->laydulieu();
        $tl= $TheLoai->laydulieu();	
        if ($_SESSION["nguoidung"]["QuyenHan"]==1){
            Header("Location:index.php?action=null");
        }else{
            $id=$_SESSION['nguoidung']['id'];
            Header("Location:index.php?action=chuongcuatoi&id=$id");
        }
    case "xoa":
        $chx = $Chuong->laydulieutheoid($_GET["id"]);
        if(isset($_GET["id"])){
            $chxoa = new CHUONG();        
            $chxoa->setid($_GET["id"]);
			$Chuong->xoa($chxoa);
        }
        $trsc = $Truyen->laydulieutheoid($chx["idTruyen"]);
        $sc = $trsc["SoChuong"]-1;
        $Truyen->dieuchinhchuong($chx["idTruyen"],$sc);
        $ch = $Chuong->laydulieu();       
        if ($_SESSION["nguoidung"]["QuyenHan"]==1){
            Header("Location:index.php?action=null");
        }else{
            $id=$_SESSION['nguoidung']['id'];
            Header("Location:index.php?action=chuongcuatoi&id=$id");
        }
        break;
    case "duyet":
        $chduyet = new CHUONG();
        $tt = $_GET["tt"];
        $chduyet->setid($_GET["id"]);
        if ($tt == 1){
            $chduyet->setkiemduyet(0);
        } else {
            $chduyet->setkiemduyet(1);
        }
        $Chuong->duyet($chduyet);
        $ch = $Chuong->laydulieu();       
        include("main.php");
        break;
    case "sua":
        $tr = $Truyen->laydulieu();
        $ch = $Chuong->laydulieutheoid($_GET["id"]);
        include("add.php");
        break;
    case "xulysua":
        session_start();
        #Xu ly ma truyen 
        $chcu = $Chuong->laydulieutheoid($_GET["id"]);
        $trcu = $Truyen->laydulieutheoid($chcu["idTruyen"]);
        if ($trcu["ID"] != $_POST["MaTruyen"]){
            #Xoa cu
            $sc = $trcu["SoChuong"]-1;
            $Truyen->dieuchinhchuong($chcu["idTruyen"],$sc);
            #Them moi
            $trm = $Truyen->laydulieutheoid($_POST["MaTruyen"]);
            $scm = $trm["SoChuong"]+1;
            $Truyen->dieuchinhchuong($_POST["MaTruyen"],$scm);
        }
        $ngayDang = date('Y-m-d');
        //Sua
        $chmoi = new CHUONG();
        $chmoi->setid($_GET["id"]);
        $chmoi->settieude($_POST["TieuDe"]);
        $chmoi->setnoidung($_POST["NoiDung"]);
        $chmoi->setngaydang($ngayDang);
        $chmoi->setidtruyen($_POST["MaTruyen"]);
        $chmoi->setnguoidang($_SESSION["nguoidung"]["id"]);
        $Chuong->sua($chmoi);
        $tr = $Truyen->laydulieu(); 
        $tg = $TacGia->laydulieu();
        $tl= $TheLoai->laydulieu();	
        if ($_SESSION["nguoidung"]["QuyenHan"]==1){
            Header("Location:index.php?action=null");
        }else{
            $id=$_SESSION['nguoidung']['id'];
            Header("Location:index.php?action=chuongcuatoi&id=$id");
        }
        break;
    case "chitiet":
        $error="";
        $ch = $Chuong->laydulieutheoid($_GET["id"]);
        $chTong = $Chuong->laydulieutheoidtruyen($ch["idTruyen"]);
        $tr = $Truyen->laydulieutheoid($ch["idTruyen"]);
        include("detail.php");
        break;
    case "chuyenchuong":
        $error="";
        $idCu = $_GET["id"];
        //Kiem tra dau, cuoi:
        $chTr = $Chuong->kt($_GET["idtr"]);
        echo $chTr[0]['id'];
        if ($chTr[0]['id'] == $_GET["id"]) {
            $error="Đây là chapter đầu tiên";
            Header("Location:index.php?action=chitiet&id=$idCu");
        } else if ($chTr[count($chTr) - 1]['id'] == $_GET["id"]) {
            $error="Đây là chapter cuối, mong là bạn đã có 1 trải ngiệm tốt với truyện";
            Header("Location:index.php?action=chitiet&id=$idCu");
        } else {
            $chTT = $Chuong->laydulieuchuyentiep($_GET["idtr"],$_GET["id"],$_GET["status"]);
            $id = $chTT["id"];
            Header("Location:index.php?action=chitiet&id=$id");
            break;
        }
        break;
    case "chuongcuatoi":
        $ch = $Chuong->laydulieutheonguoidung($_GET["id"]);
        include("main.php");
        break;
    default:
        break;
}
?>  