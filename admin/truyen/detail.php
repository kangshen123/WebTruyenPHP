<?php include("../../public/inc/head.php")?>

<body>
    <?php include("../../public/inc/top.php")?>
  <div class="container">
    <div class="novel-content">
        <?php $tk = $TaiKhoan->laydulieutheoid($tr['NguoiDang'])?>
        <?php $tg = $TacGia->laydulieutheoid($tr['IdTacGia'])?>
        <?php $tl = $TheLoai->laydulieutheoid($tr['TheLoai'])?>
      <div class="novel-title"><?php echo $tr["TieuDe"]?></div>
      <div class="novel-info">
        <div class="novel-info-left">
          <div class="novel-genre">Thể loại: <?php echo $tl["TenTheLoai"] ?></div>
          <div class="novel-summary">Tóm tắt: <?php echo $tr["TomTat"]?></div>
          <div class="novel-chapters">Lượt xem: <?php echo $tr["LuotXem"]?></div>
          <div class="novel-chapters">Số chương: <?php echo $tr["SoChuong"]?></div>
        </div>
        <div class="novel-info-right">
          <div class="novel-image">
            <img src="../../<?php echo $tr["HinhAnh"]?>" alt="Ảnh minh họa">
          </div>
        </div>
      </div>
      <div class="novel-chapters-list">
        <?php $stt = 0 ?>
        <?php foreach($ch as $ch){ ?>
          <?php if($ch["KiemDuyet"] == 1){ ?>
            <div class = "chapter-list"><a href="../chuong/index.php?action=chitiet&id=<?php echo $ch['id']?>"><?php echo $ch['TieuDe']?></a></div>
            <?php }; ?>
        <?php } ?>
      </div>
    </div>
    
  </div>
  <?php include("../../public/inc/bottom.php")?>
</body>
</html>