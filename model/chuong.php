<?php
class CHUONG{
    // khai báo các thuộc tính
    private $id;
    private $TieuDe;
    private $NoiDung;
    private $NgayDang;
    private $LuotXem;
    private $KiemDuyet;
    private $IdTruyen;
    private $NguoiDang;
    #id
    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    #Tiêu đề
    public function gettieude(){ return $this->TieuDe; }
    public function settieude($value){ $this->TieuDe = $value; }
    #Tóm tắt
    public function getnoidung(){ return $this->NoiDung; }
    public function setnoidung($value){ $this->NoiDung = $value; }
    #Ngày đăng
    public function getngaydang(){ return $this->NgayDang; }
    public function setngaydang($value){ $this->NgayDang = $value; }
    #Lượt xem
    public function gettenluotxem(){ return $this->LuotXem; }
    public function settenluotxem($value){ $this->LuotXem = $value; }
    #Kiểm duyệt
    public function getkiemduyet(){ return $this->KiemDuyet; }
    public function setkiemduyet($value){ $this->KiemDuyet = $value; }
    #Id truyen
    public function getidtruyen(){ return $this->IdTruyen; }
    public function setidtruyen($value){ $this->IdTruyen = $value; }
    #Người đăng
    public function getnguoidang(){ return $this->NguoiDang; }
    public function setnguoidang($value){ $this->NguoiDang = $value; }
    // Lấy danh sách thể loại
    public function laydulieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM chuong";
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
            $sql = "SELECT * FROM chuong WHERE id=:id";
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
    // Lấy chương theo id truyện
    public function laydulieutheoidtruyen($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM chuong WHERE idTruyen=:id";
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
    public function them($chuong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO chuong(TieuDe,NoiDung,NgayDang,LuotXem,KiemDuyet,IdTruyen,NguoiDang) 
                VALUES(:tieude,:noidung,:ngaydang,0,0,:idtruyen,:nguoidang)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tieude", $chuong->TieuDe);
            $cmd->bindValue(":noidung", $chuong->NoiDung);
            $cmd->bindValue(":ngaydang", $chuong->NgayDang);
            $cmd->bindValue(":idtruyen", $chuong->IdTruyen);
            $cmd->bindValue(":nguoidang", $chuong->NguoiDang);
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
    public function xoa($chuong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM chuong WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $chuong->id);
            $result = $cmd->execute();
            return $result;
        }
            catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa chương theo id truyện
    public function xoatheoidtruyen($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM chuong WHERE idTruyen=:id";
            $cmd = $dbcon->prepare($sql);
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
    // Cập nhật 
    public function sua($chuong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE chuong SET TieuDe=:tieude,
                                        NoiDung=:noidung,
                                        NgayDang=:ngaydang,
                                        IdTruyen=:idtruyen,
                                        NguoiDang=:nguoidang
                                        WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tieude", $chuong->TieuDe);
            $cmd->bindValue(":noidung", $chuong->NoiDung);
            $cmd->bindValue(":ngaydang", $chuong->NgayDang);
            $cmd->bindValue(":idtruyen", $chuong->IdTruyen);
            $cmd->bindValue(":nguoidang", $chuong->NguoiDang);
            $cmd->bindValue(":id", $chuong->id);
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
    public function duyet($chuong){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE chuong SET KiemDuyet=:kiemduyet WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":kiemduyet", $chuong->KiemDuyet);
            $cmd->bindValue(":id", $chuong->id);
            $result = $cmd->execute();
            return $result;
        }
            catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }

    }
    //Kiểm tra đầu cuối
    public function kt($idtruyen){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT id FROM chuong WHERE idTruyen = :id ORDER BY id ASC;";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $idtruyen);
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
    //Lay dong tiep theo
    public function laydulieuchuyentiep($idtruyen,$id,$status){
        $dbcon = DATABASE::connect();
        try{
            if ($status == "up"){
                $sql = "SELECT * FROM chuong WHERE id > :id AND idTruyen=:idtruyen  ORDER BY id ASC LIMIT 1;";
            }else{
                $sql = "SELECT * FROM chuong WHERE id < :id AND idTruyen=:idtruyen  ORDER BY id ASC LIMIT 1;";
            }
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->bindValue(":idtruyen", $idtruyen);
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
