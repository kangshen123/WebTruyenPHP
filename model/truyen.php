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
    private $TheLoai;
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
    #Thể loại
    public function gettheloai(){ return $this->TheLoai; }
    public function settheloai($value){ $this->TheLoai = $value; }
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
            $sql = "SELECT * FROM truyen WHERE id=:id";
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
    // Lấy thể loại theo tl
    public function laydulieutheotheloai($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM truyen WHERE TheLoai=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
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
    // Lấy thể loại theo người dùng
    public function laydulieutheonguoidung($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM truyen WHERE NguoiDang=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
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
    // Thêm mới
    public function them($truyen){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO truyen(TieuDe,TomTat,HinhAnh,NgayDang,LuotXem,SoChuong,KiemDuyet,IdTacGia,NguoiDang,TheLoai) 
                VALUES(:tieude,:tomtat,:hinhanh,:ngaydang,0,0,0,:idtacgia,:nguoidang,:theloai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tieude", $truyen->TieuDe);
            $cmd->bindValue(":tomtat", $truyen->TomTat);
            $cmd->bindValue(":ngaydang", $truyen->NgayDang);
            $cmd->bindValue(":hinhanh", $truyen->HinhAnh);
            $cmd->bindValue(":idtacgia", $truyen->IdTacGia);
            $cmd->bindValue(":nguoidang", $truyen->NguoiDang);
            $cmd->bindValue(":theloai", $truyen->TheLoai);
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
    public function xoa($truyen){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM truyen WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $truyen->id);
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
    public function sua($truyen){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE truyen SET TieuDe=:tieude,
                                        TomTat=:tomtat,
                                        HinhAnh=:hinhanh,
                                        NgayDang=:ngaydang,
                                        IdTacGia=:idtacgia,
                                        NguoiDang=:nguoidang,
                                        TheLoai=:theloai
                                        WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tieude", $truyen->TieuDe);
            $cmd->bindValue(":tomtat", $truyen->TomTat);
            $cmd->bindValue(":ngaydang", $truyen->NgayDang);
            $cmd->bindValue(":hinhanh", $truyen->HinhAnh);
            $cmd->bindValue(":idtacgia", $truyen->IdTacGia);
            $cmd->bindValue(":nguoidang", $truyen->NguoiDang);
            $cmd->bindValue(":theloai", $truyen->TheLoai);
            $cmd->bindValue(":id", $truyen->id);
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
    public function duyet($truyen){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE truyen SET KiemDuyet=:kiemduyet WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":kiemduyet", $truyen->KiemDuyet);
            $cmd->bindValue(":id", $truyen->id);
            $result = $cmd->execute();
            return $result;
        }
            catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }

    }
    //Thêm chương
    public function dieuchinhchuong($id,$SoChuong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE truyen SET SoChuong=:sochuong WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":sochuong", $SoChuong);
            $cmd->bindValue(":id", $id);
            $result = $cmd->execute();
            return $result;
        }
            catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }

    }
    
    // Lấy truyện mặt hàng thuộc 1 thể loại
    public function laydulieutheotacgia($tacgia_id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM truyen WHERE danhmuc_id=:madm" ;
            $cmd = $dbcon->prepare($sql);
			$cmd->bindValue(":madm",$danhmuc_id);
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

}
?>
