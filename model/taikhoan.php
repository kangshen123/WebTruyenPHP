<?php
class TAIKHOAN{
    // khai báo các thuộc tính
    private $id;
    private $hoten;
    private $email;
    private $hinhanh;
    private $tendangnhap;
    private $matkhau;
    private $quyenhan;
    private $kichhoat;
    #id
    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    #Hoten
    public function getten(){ return $this->hoten; }
    public function setten($value){ $this->hoten = $value; }
    #email
    public function getemail(){ return $this->email; }
    public function setemail($value){ $this->email = $value; }
    #Hinh anh
    public function gethinhanh(){ return $this->hinhanh; }
    public function sethinhanh($value){ $this->hinhanh = $value; }
    #Ten dang nhap
    public function gettendangnhap(){ return $this->tendangnhap; }
    public function settendangnhap($value){ $this->tendangnhap = $value; }
    #Mat khau
    public function getmatkhau(){ return $this->matkhau; }
    public function setmatkhau($value){ $this->matkhau = $value; }
    #Quyen han
    public function getquyenhan(){ return $this->quyenhan; }
    public function setquyenhan($value){ $this->quyenhan = $value; }
    #kich hoat
    public function getkichhoat(){ return $this->kichhoat; }
    public function setkichhoat($value){ $this->kichhoat = $value; }

    // Lấy danh sách thể loại
    public function laydulieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM taikhoan";
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

}
?>
