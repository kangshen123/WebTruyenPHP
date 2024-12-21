<?php include("../../public/inc/head.php")?>
<body>
	<?php 
		$action = $_REQUEST["action"];
	?>
	<?php if ($action == "them"){?>
	
	<div class="container">
	<?php include("../../public/inc/top.php")?>
		<div class="card mt-3">
			<div class="card-header">Thêm thể loại</div>
			<div class="card-body">
				<form action="index.php?action=xulythem" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
						<label for="TenTheLoai" class="form-label">Tên thể loại</label>
						<input type="text" class="form-control" id="TenTheLoai" name="TenTheLoai" required>
					</div>
					<button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up"></i> Thêm thể loại</button>
				</form>
			</div>
		</div>
		</div>
	<?php } else { ?>
		<div class="container">
		<?php include("../../public/inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Sửa thể loại<i></i></div>
			<div class="card-body">
				<form action="index.php?action=capnhat&id=<?php echo $tl['id']?>" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
						<label for="TenTheLoai" class="form-label">Tên thể loại</label>
						<input type="text" class="form-control" id="TenTheLoai" name="TenTheLoai" value="<?php echo $tl['TenTheLoai'] ?> " required />
					</div>
					<button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up"></i> Cập nhật chủ đề</button>
				</form>
			</div>
		</div>
	<?php }?>
	<?php include("../../public/inc/bottom.php")?>
</body>
</html>