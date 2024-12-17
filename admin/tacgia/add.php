<?php include("../inc/head.php")?>
<body>
	<?php 
		$action = $_REQUEST["action"];
	?>
	<?php if ($action == "them"){?>
	
	<div class="container">
        <?php include("../inc/top.php") ?>
		<div class="card mt-3">
			<div class="card-header">Thêm tác giả</div>
			<div class="card-body">
				<form action="index.php?action=xulythem" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
						<label for="TenTacGia" class="form-label">Tên tác giả</label>
						<input type="text" class="form-control" id="TenTacGia" name="TenTacGia" required>
					</div>
					<button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up"></i> Thêm tác giả</button>
				</form>
			</div>
		</div>
		</div>
	<?php } else { ?>
		<div class="container">
		<?php include("../inc/top.php") ?>
		
		<div class="card mt-3">
			<div class="card-header">Sửa thể loại<i></i></div>
			<div class="card-body">
				<form action="index.php?action=capnhat&id=<?php echo $tg['id']?>" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
						<label for="TenTacGia" class="form-label">Tên tác giả</label>
						<input type="text" class="form-control" id="TenTacGia" name="TenTacGia" value="<?php echo $tg['TenTacGia'] ?> " required />
					</div>
					<button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up"></i> Cập nhật tác giả</button>
				</form>
			</div>
		</div>
	<?php }?>
	<?php include("../inc/bottom.php") ?>
</body>
</html>