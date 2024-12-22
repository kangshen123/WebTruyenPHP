<?php include("../../public/inc/head.php")?>
<body>
<?php 
	$action = $_REQUEST["action"];
?>
<?php if ($action == "them"){?>
	<div class="container">
    <?php include("../../public/inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Thêm truyện</div>
			<div class="card-body">
				<form action="index.php?action=xulythem" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
					<div class="mb-3">
						<label for="MaTheLoai" class="form-label">Thể loại</label>
						<select class="form-select" id="MaTheLoai" name="MaTheLoai" required>
							<option value="">-- Chọn --</option>
							<?php foreach($tl as $tl){ ?>
								<option value="<?php echo $tl["id"] ?>"><?php echo $tl["TenTheLoai"] ?></option>
							<?php } ?>
						</select>
					</div>
                    <div class="mb-3">
						<label for="MaTacGia" class="form-label">Tác giả</label>
						<select class="form-select" id="MaTacGia" name="MaTacGia" onchange="toggleOtherAuthorInput()" required>
							<option value="">-- Chọn --</option>
							<?php foreach($tg as $tg){ ?>
								<option value="<?php echo $tg["id"] ?>"><?php echo $tg["TenTacGia"] ?></option>
							<?php } ?>
                            <option id="MaTacGia" name="MaTacGia" value="other">Other</option>
						</select>
                        <div class="mb-3" id="otherAuthorDiv" style="display: none;">
                                <label for="otherAuthor" class="form-label">Nhập tên tác giả</label>
                                <input type="text" class="form-control" id="otherAuthor" name="otherAuthor">
                        </div>
					</div>
					<div class="mb-3">
						<label for="TieuDe" class="form-label">Tiêu đề</label>
						<input type="text" class="form-control" id="TieuDe" name="TieuDe" value="" required />
					</div>
					
					<div class="mb-3">
						<label for="HinhAnh">Hình ảnh:</label>
						<input type="file"  class="form-control" name="HinhAnh" id="HinhAnh" value="" required >
					</div>
					<div class="mb-3">
						<label for="TomTat" class="form-label">Tóm tắt truyện</label>
						<textarea class="form-control" id="TomTat" name="TomTat" required></textarea>
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up"></i> Đăng truyện</button>
				</form>
			</div>
		</div>
	</div>
    <script>
        <?php include("../../public/javascript/othertg.js") ?> 
    </script>  
	<?php include("../../public/inc/bottom.php")?>
	<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('NoiDung', {
			customConfig: 'http://127.0.0.1:3000/js/config.js'
		});
	</script>
<?php } else { ?>
    <div class="container">
    <?php include("../../public/inc/top.php")?>
		<div class="card mt-3">
			<div class="card-header">Sửa truyện</div>
			<div class="card-body">
				<form action="index.php?action=xulysua&id=<?php echo $tr["ID"]?>" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
					<div class="mb-3">
						<label for="MaTheLoai" class="form-label">Thể loại</label>
						<select class="form-select" id="MaTheLoai" name="MaTheLoai" required>
							<option value="">--Chọn--</option>
							<?php foreach($tl as $tl){ ?>
								<option value="<?php echo $tl["id"] ?>"><?php echo $tl["TenTheLoai"] ?></option>
							<?php } ?>
						</select>
					</div>
                    <div class="mb-3">
						<label for="MaTacGia" class="form-label">Tác giả</label>
						<select class="form-select" id="MaTacGia" name="MaTacGia" onchange="toggleOtherAuthorInput()" required>
                        <option value="">--Chọn--</option>
							<?php foreach($tg as $tg){ ?>
								<option value="<?php echo $tg["id"] ?>"><?php echo $tg["TenTacGia"] ?></option>
							<?php } ?>
                            <option id="MaTacGia" name="MaTacGia" value="other">Other</option>
						</select>
                        <div class="mb-3" id="otherAuthorDiv" style="display: none;">
                                <label for="otherAuthor" class="form-label">Nhập tên tác giả</label>
                                <input type="text" class="form-control" id="otherAuthor" name="otherAuthor">
                        </div>
					</div>
					<div class="mb-3">
						<label for="TieuDe" class="form-label">Tiêu đề</label>
						<input type="text" class="form-control" id="TieuDe" name="TieuDe" value="<?php echo $tr["TieuDe"] ?>" required />
					</div>
					
					<div class="mb-3">
						<label for="HinhAnh">Hình ảnh:</label>
						<input type="file"  class="form-control" name="HinhAnh" id="HinhAnh" value="" required >
					</div>
					<div class="mb-3">
						<label for="TomTat" class="form-label">Tóm tắt truyện</label>
						<textarea class="form-control" id="TomTat" name="TomTat" value="" required><?php echo $tr["TomTat"] ?></textarea>
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up"></i> Cập nhật truyện</button>
				</form>
			</div>
		</div>
	</div>
    <script>
        <?php include("../../public/javascript/othertg.js") ?> 
    </script>  
	<?php include("../../public/inc/bottom.php")?>
	<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('NoiDung', {
			customConfig: 'http://127.0.0.1:3000/js/config.js'
		});
	</script>
<?php }?>
</body>
    
</html>