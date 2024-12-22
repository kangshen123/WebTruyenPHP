<?php
class TRUYEN_THELOAI{
    // khai báo các thuộc tính
    private $id;
    private $idtheloai;
    private $idtruyen;

    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    public function getidtheloai(){ return $this->idtheloai; }
    public function setidtheloai($value){ $this->idtheloai = $value; }
    public function getidtruyen(){ return $this->idtruyen; }
    public function setidtruyen($value){ $this->idtruyen = $value; }

    // Lấy danh sách thể loại
    public function laydulieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM truyen_theloai";
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
    public function laydulieutheoidtruyen($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM truyen_theloai WHERE idTruyen=:id";
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
    // Lấy thể loại theo id
    public function laydulieutheoidtheloai($id){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM truyen_theloai WHERE idTheLoai=:id";
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
    public function them($tr_tl){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO truyen_theloai(idTruyen,idTheLoai) VALUES(:trid,:tlid)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":trid", $tr_tl->idtruyen);
            $cmd->bindValue(":tlid", $tr_tl->idtheloai);
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
    public function xoa($tr_tl){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM truyen_theloai WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $tr_tl->id);
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
    public function sua($tr_tl){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE truyen_theloai SET idTruyen=:trid, idTheLoai=:tlid WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":trid", $tr_tl->idtruyen);
            $cmd->bindValue(":tlid", $tr_tl->idtheloai);
            $cmd->bindValue(":id", $tr_tl->id);
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
