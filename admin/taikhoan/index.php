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
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = "../images/PicTruyen"; // Thư mục lưu trữ
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); // Tạo thư mục nếu chưa tồn tại
            }
    
            $file = $_FILES['image'];
            $fileTmpPath = $file['tmp_name'];
            $fileType = mime_content_type($fileTmpPath);
            $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
            $allowedMimeTypes = ["image/jpg", "image/jpeg", "image/png", "image/webp"];
            $allowedExtensions = ["jpg", "jpeg", "png", "webp"];
    
            if (in_array($fileType, $allowedMimeTypes) && in_array($fileExtension, $allowedExtensions)) {
                $randomFileName = generateRandomNumbers() . "." . $fileExtension; // Tạo tên file ngẫu nhiên
                $destPath = $uploadDir . $randomFileName;
    
                if (move_uploaded_file($fileTmpPath, $destPath)) {
                    $imageUrl = $destPath; // Lưu đường dẫn file
                } else {
                    die("Error: Failed to move uploaded file.");
                }
            } else {
                die("Error: Invalid image type.");
            }
        }
        //Xu ly them:
        $tkmoi = new TAIKHOAN();
        $tkmoi->setten();
        $tkmoi->setemail();
        $tkmoi->sethinhanh();
        $tkmoi->settendangnhap();
        $tkmoi->setmatkhau($password);
        $tkmoi->setquyenhan();
        // thêm
        $TaiKhoan->them($tkmoi);
        // load danh sách
        $tk = $TaiKhoan->laydulieu();       
        include("main.php");
        break; 
    default:
        break;
    }  
?>

