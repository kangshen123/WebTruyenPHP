<?php include("../../public/inc/head.php")?>

<body>
	<div class="container">
	<?php include("../../public/inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">error</div>
			<div class="card-body">
			<p style='color: red;'>Mật khẩu không trùng khớp</p>
			<p>Xin vui lòng điền lại thông tin</p>
			<label>mật khẩu:</label>
			<h1><?php echo $_POST["MatKhau"]?></h1>
			<label>xác nhận mật khẩu:</label>
			<h1><?php echo $_POST["XacNhanMatKhau"]?></h1>
			</div>
		</div>
		
	</div>
	
	<?php include("../../public/inc/bottom.php")?>
</body>

</html>