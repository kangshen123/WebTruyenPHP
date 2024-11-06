<?php
class THELOAI{
    // khai báo các thuộc tính
    private $id;
    private $tentheloai;

    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    public function gettentheloai(){ return $this->tentheloai; }
    public function settentheloai($value){ $this->tentheloai = $value; }

    // Lấy danh sách thể loại
    public function laydulieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM theloai";
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
            $sql = "SELECT * FROM theloai WHERE id=:id";
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
    public function them($theloai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO theloai(TenTheLoai) VALUES(:tentheloai)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tentheloai", $theloai->TenTheLoai);
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
    public function xoa($theloai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM theloai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $theloai->id);
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
    public function sua($theloai){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE theloai SET TenTheLoai=:tentheloai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tentheloai", $theloai->TenTheLoai);
            $cmd->bindValue(":id", $theloai->id);
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
