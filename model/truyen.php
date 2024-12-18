<?php
class TRUYEN{
    // khai báo các thuộc tính
    private $id;
    private $TieuDe;
    private $TomTat;
    private $NgayDang;
    private $LuotXem;
    private $SoChuong;
    private $KiemDuyet;
    private $HinhAnh;
    private $IdTacGia;
    private $NguoiDang;
    #id
    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    #Tiêu đề
    public function gettieude(){ return $this->TieuDe; }
    public function settieude($value){ $this->TieuDe = $value; }
    #Tóm tắt
    public function gettomtat(){ return $this->TomTat; }
    public function settomtat($value){ $this->TomTat = $value; }
    #Ngày đăng
    public function getngaydang(){ return $this->NgayDang; }
    public function setngaydang($value){ $this->NgayDang = $value; }
    #Lượt xem
    public function gettenluotxem(){ return $this->LuotXem; }
    public function settenluotxem($value){ $this->LuotXem = $value; }
    #Số chương
    public function getsochuong(){ return $this->SoChuong; }
    public function setsochuong($value){ $this->SoChuong = $value; }
    #Kiểm duyệt
    public function getkiemduyet(){ return $this->KiemDuyet; }
    public function setkiemduyet($value){ $this->KiemDuyet = $value; }
    #Hình ảnh
    public function gethinhanh(){ return $this->HinhAnh; }
    public function sethinhanh($value){ $this->HinhAnh = $value; }
    #Id tác giả
    public function getidtacgia(){ return $this->IdTacGia; }
    public function setidtacgia($value){ $this->IdTacGia = $value; }
    #Người đăng
    public function getnguoidang(){ return $this->NguoiDang; }
    public function setnguoidang($value){ $this->NguoiDang = $value; }

    // Lấy danh sách thể loại
    public function laydulieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM truyen";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy thể loại theo id
    public function laydulieutheoid($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM taikhoan WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();             
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Thêm mới
    public function them($taikhoan){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO taikhoan(HoTen,Email,HinhAnh,TenDangNhap,MatKhau,QuyenHan,KichHoat) 
                VALUES(:hoten,:email,:hinhanh,:tendangnhap,:matkhau,:quyenhan,1)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":hoten", $taikhoan->hoten);
            $cmd->bindValue(":email", $taikhoan->email);
            $cmd->bindValue(":hinhanh", $taikhoan->hinhanh);
            $cmd->bindValue(":tendangnhap", $taikhoan->tendangnhap);
            $cmd->bindValue(":matkhau", $taikhoan->matkhau);
            $cmd->bindValue(":quyenhan", $taikhoan->quyenhan);
            $result = $cmd->execute();            
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoa($taikhoan){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM taikhoan WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $taikhoan->id);
            $result = $cmd->execute();
            return $result;
        }
            catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function sua($taikhoan){
        $dbcon = DATABASE::connect();
        $kichhoat=1;
        try{
            $sql = "UPDATE taikhoan SET HoTen=:hoten,
                                        Email=:email,
                                        HinhAnh=:hinhanh,
                                        TenDangNhap=:tendangnhap,
                                        MatKhau=:matkhau,
                                        quyenhan=:quyenhan,
                                        KichHoat=:kichhoat
                                        WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":hoten", $taikhoan->hoten);
            $cmd->bindValue(":email", $taikhoan->email);
            $cmd->bindValue(":hinhanh", $taikhoan->hinhanh);
            $cmd->bindValue(":tendangnhap", $taikhoan->tendangnhap);
            $cmd->bindValue(":matkhau", $taikhoan->matkhau);
            $cmd->bindValue(":quyenhan", $taikhoan->quyenhan);
            $cmd->bindValue(":id", $taikhoan->id);
            $cmd->bindValue(":kichhoat", $kichhoat);
            $result = $cmd->execute();   
            //print_r($cmd->debugDumpParams());         
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    //Duyệt
    public function duyet($taikhoan){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE taikhoan SET KichHoat=:kichhoat WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":kichhoat", $taikhoan->kichhoat);
            $cmd->bindValue(":id", $taikhoan->id);
            $result = $cmd->execute();
            return $result;
        }
            catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }

    }

}
?>
