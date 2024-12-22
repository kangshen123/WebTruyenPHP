<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Truyện Online</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <!-- Include Bootstrap Icons CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <style>
    body {
      background-color: antiquewhite;
    }
    .title{
        display: flex;
        margin-left: 30%;
    }
    .story-content {
      color: white;
      background-color: #333;
      padding: 20px;
      width: 80%;
      height: auto;
      margin: 0 auto;
      font-size: 1.2rem;
      line-height: 1.6;
    }
  </style>
</head>
<body>
<?php include("../../public/inc/top.php")?>
  <div class="container my-5">
    <h1 class="title" ><?php echo $tr["TieuDe"]?></h1>
    <div class="story-content"> 
      <h1><?php echo $ch["TieuDe"]?></h1>
      <p><?php echo $ch["NoiDung"]?></p>
      <!--<p>Trong chuyến đi, Lancelot đã gặp gỡ nhiều nhân vật thú vị, từ những pháp sư thông thái đến những nàng công chúa xinh đẹp. Mỗi người đều có câu chuyện riêng và đã giúp Lancelot hoàn thành nhiệm vụ của mình.</p>-->
      <div class="d-flex justify-content-between mt-4">
    <!-- Nút Chương trước -->
        <button class="btn btn-primary prev-chapter" data-prev-id="" onclick="window.location.href='index.php?action=chuyenchuong&id=<?php echo $ch['id']?>&idtr=<?php echo $tr['ID']?>&status=down'">
            <i class="bi bi-chevron-left"></i> Chương trước
        </button>

        <!-- Dropdown danh sách chương -->
        <select class="form-select" onchange="window.location.href = 'index.php?action=chitiet&id='+ this.value ">
                <option value="">-- Chọn --</option>
                <?php foreach($chTong as $chTong) {?>
                    <option value="<?php echo $chTong["id"] ?>"><?php echo $chTong["TieuDe"] ?></option>
                <?php } ?>
        </select>

        <!-- Nút Chương kế -->
        <button class="btn btn-primary next-chapter" data-next-id="" onclick="window.location.href='index.php?action=chuyenchuong&id=<?php echo $ch['id']?>&idtr=<?php echo $tr['ID']?>&status=up'">
            Chương kế <i class="bi bi-chevron-right"></i>
        </button>
    </div>
    <label for="Error" class="form-label"><?php echo $error ?></label>
        <!--End-->
    </div>
  </div>
  <?php include("../../public/inc/bottom.php")?>
</body>
</html>