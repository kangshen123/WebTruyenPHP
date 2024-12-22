<?php
class TACGIA{
    // khai báo các thuộc tính
    private $id;
    private $tentacgia;

    public function getid(){ return $this->id; }
    public function setid($value){ $this->id = $value; }
    public function gettentacgia(){ return $this->tentacgia; }
    public function settentacgia($value){ $this->tentacgia = $value; }

    // Lấy danh sách thể loại
    public function laydulieu(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT * FROM tacgia";
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
            $sql = "SELECT * FROM tacgia WHERE id=:id";
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
    public function them($tacgia){
        $dbcon = DATABASE::connect();
        try{
            $sql = "INSERT INTO tacgia(TenTacGia) VALUES(:tentacgia)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tentacgia", $tacgia->tentacgia);
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
    public function xoa($tacgia){
        $dbcon = DATABASE::connect();
        try{
            $sql = "DELETE FROM tacgia WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $tacgia->id);
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
    public function sua($tacgia){
        $dbcon = DATABASE::connect();
        try{
            $sql = "UPDATE tacgia SET TenTacGia=:tentacgia WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tentacgia", $tacgia->tentacgia);
            $cmd->bindValue(":id", $tacgia->id);
            $result = $cmd->execute();
            return $result;
        }
            catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Kiem tra tac gia da ton tai chua
    public function kiemtratontai($tentacgia) {
        $dbcon = DATABASE::connect();
        try {
            // Truy vấn kiểm tra tên tác giả đã tồn tại hay chưa
            $sql = "SELECT COUNT(*) FROM tacgia WHERE TenTacGia = :tentacgia";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tentacgia", $tentacgia);
            $cmd->execute();
            
            // Lấy kết quả trả về từ câu lệnh COUNT
            $result = $cmd->fetchColumn();
            
            // Nếu kết quả lớn hơn 0, tức là tên tác giả đã tồn tại
            return $result > 0;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }    
    //Lấy tác giả bằng tên tác giả
    public function laydulieutheoten($tentacgia) {
        $dbcon = DATABASE::connect();
        try {
            // Truy vấn lấy tác giả theo tên
            $sql = "SELECT * FROM tacgia WHERE TenTacGia = :tentacgia";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tentacgia", $tentacgia);
            $cmd->execute();
            
            // Kiểm tra nếu có tác giả tìm thấy
            $result = $cmd->fetch(PDO::FETCH_ASSOC);
            
            if ($result) {
                // Trả về thông tin tác giả dưới dạng mảng
                return $result;
            } else {
                // Nếu không tìm thấy tác giả, trả về false
                return false;
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    
}
?>
