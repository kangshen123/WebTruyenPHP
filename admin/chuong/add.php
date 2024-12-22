<?php include("../../public/inc/head.php")?>

<body>
<?php 
	$action = $_REQUEST["action"];
?>
<?php if ($action == "them"){?>
	<div class="container">
    <?php include("../../public/inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Thêm chương</div>
			<div class="card-body">
				<form action="index.php?action=xulythem" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
						<label for="MaTruyen" class="form-label">Truyện</label>
						<select class="form-select" id="MaTruyen" name="MaTruyen" required>
							<option value="">-- Chọn --</option>
							<?php foreach($tr as $tr) {?>
								<option value="<?php echo $tr["ID"] ?>"><?php echo $tr["TieuDe"] ?></option>
							<?php } ?>
						</select>
					</div>
					
					<div class="mb-3">
						<label for="TieuDe" class="form-label">Tiêu đề</label>
						<input type="text" class="form-control" id="TieuDe" name="TieuDe" value="" required />
					</div>
					
					<div class="mb-3">
						<label for="NoiDung" class="form-label">Nội dung bài viết</label>
						<textarea class="form-control ckeditor" id="NoiDung" name="NoiDung" required></textarea>
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up"></i> Đăng chương</button>
				</form>
			</div>
		</div>
		
		<?php include("../../public/inc/bottom.php")?>
	</div>
	
	<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('NoiDung', {
			customConfig: 'http://127.0.0.1:3000/js/config.js'
		});
	</script>
    <?php } else { ?>
<body>
	<div class="container">
    <?php include("../../public/inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Sửa <?php echo  $ch["TieuDe"]?></div>
			<div class="card-body">
				<form action="index.php?action=xulysua&id=<?php echo $ch["id"]?>" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
						<label for="MaTruyen" class="form-label">Truyện</label>
						<select class="form-select" id="MaTruyen" name="MaTruyen" required>
							<option value="">-- Chọn --</option>
							<?php foreach($tr as $tr) {?>
								<option value="<?php echo $tr["ID"] ?>"><?php echo $tr["TieuDe"] ?></option>
							<?php } ?>
						</select>
					</div>
					
					<div class="mb-3">
						<label for="TieuDe" class="form-label">Tiêu đề</label>
						<input type="text" class="form-control" id="TieuDe" name="TieuDe" value="<?php echo $ch["TieuDe"] ?>" required />
					</div>
					
					
					<div class="mb-3">
						<label for="NoiDung" class="form-label">Nội dung chương</label>
						<textarea class="form-control ckeditor" id="NoiDung" name="NoiDung" required><?php echo $ch["NoiDung"] ?></textarea>
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up"></i> Cập nhật chương</button>
				</form>
			</div>
		</div>
			
	</div>
	<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('NoiDung', {
			customConfig: 'http://127.0.0.1:3000/js/config.js'
		});
	</script>
</body>

</html>
    <?php } ?>
    <?php include("../../public/inc/bottom.php")?>
</body>

</html>