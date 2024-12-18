<?php include("../inc/head.php")?>


<body>
	<div class="container">
	<?php include("../inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Đăng kí tài khoản</div>
			<div class="card-body">
				<form action="index.php?action=xulythem" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
					<div class="mb-3">
						<label for="HoVaTen" class="form-label">Họ và tên</label>
						<input type="text" class="form-control" id="HoVaTen" name="HoVaTen" required />
					</div>
					
					<div class="mb-3">
						<label for="Email" class="form-label">Email</label>
						<input type="email" class="form-control" id="Email" name="Email" />
					</div>
					
					<div class="mb-3">
						<label for="HinhAnh" class="form-label">Hình ảnh</label>
						<input type="file" class="form-control" id="HinhAnh" name="HinhAnh" placeholder="Tập tin ảnh đại diện" />
					</div>
					
					<div class="mb-3">
						<label for="TenDangNhap" class="form-label">Tên đăng nhập</label>
						<input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" required />
					</div>
					
					<div class="mb-3">
						<label for="MatKhau" class="form-label">Mật khẩu</label>
						<input type="password" class="form-control" id="MatKhau" name="MatKhau" required />
					</div>
					
					<div class="mb-3">
						<label for="XacNhanMatKhau" class="form-label">Xác nhận mật khẩu</label>
						<input type="password" class="form-control" id="XacNhanMatKhau" name="XacNhanMatKhau" required />
					</div>
					
					<button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up"></i> Thêm tài khoản</button>
				</form>
			</div>
		</div>
	</div>
	<?php include("../inc/bottom.php") ?>
</body>

</html>