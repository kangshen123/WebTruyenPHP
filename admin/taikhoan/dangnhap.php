<?php include("../inc/head.php")?>


<body>
	<div class="container">
    <?php include("../inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Đăng nhập</div>
			<div class="card-body">
				<form action="index.php?action=xulydangnhap" method="post" class="needs-validation" novalidate>
					<div class="mb-3">
						<label for="TenDangNhap" class="form-label">Tên đăng nhập</label>
						<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" required />
					</div>
					
					<div class="mb-3">
						<label for="MatKhau" class="form-label">Mật khẩu</label>
						<input type="password" class="form-control" id="MatKhau" name="MatKhau" required />
						<label for="MatKhau" class="form-label"><?php echo $error ?></label>
					</div>

					<button type="submit" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i> Đăng nhập</button>
				</form>
			</div>
		</div>
		
	</div>
	
    <?php include("../inc/bottom.php") ?>
</body>

</html>