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
    public function laytheloai(){
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

}
?>
