<?php include("../inc/head.php")?>

<body>
	<div class="container">
	<?php include("../inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Tài khoản</div>
			<div class="card-body table-responsive">
				<a href="index.php?action=them" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Thêm mới</a>
				<table class="table table-bordered table-hover table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th>Họ và tên</th>
							<th>Email</th>
							<th>Hình ảnh</th>
							<th>Tên đăng nhập</th>
							<th>Quyền hạn</th>
							<th>Trạng thái</th>
							<th width="5%">Sửa</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php $id=0 ?>
						<?php foreach ($tk as $tk) {?>
							<tr>
								<td><?php $id++ ?></td>
								<td><?php $tk["HoTen"] ?></td>
								<td><?php $tk["Email"] ?></td>
								<td><?php $tk["HinhAnh"] ?></td>
								<td><?php $tk["TenDangNhap"] ?></td>
								<td><?php $tk["QuyenHan"] ?></td>
								<td class="text-center">
									<td>Thêm nút</td>
								</td>
								<td class="text-center"><a href="#"><i class="bi bi-pencil-square"></i></a></td>
								<td class="text-center"><a href="index.php?action=xoa&id=<?php echo $tk["id"]?>" onclick="return confirm('Bạn có muốn xóa chủ đề <?php echo $tk['HoTen']?> không?');"><i class="bi bi-trash text-danger"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	
	<?php include("../inc/bottom.php") ?>
</body>

</html>