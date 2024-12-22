<?php include("../../public/inc/head.php")?>

<body>
	<div class="container">
	<?php include("../../public/inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Tài khoản</div>
			<div class="card-body table-responsive">
				<a href="index.php?action=them" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Thêm mới</a>
				<table class="table table-bordered table-hover table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">STT</th>
							<th>Avatar</th>
							<th>Họ và tên</th>
							<th>Email</th>
							<th>Tên đăng nhập</th>
							<th>Quyền hạn</th>
							<th>Trạng thái</th>
							<th width="5%">Sửa</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php $id=0 ?>
						<?php foreach($tk as $tk) {?>
							<tr>
								<td><?php echo $id = $id+1 ?></td>
								<td><img class="fit-img" src="../../<?php echo $tk["HinhAnh"] ?>"></td>
								<td><?php echo $tk["HoTen"] ?></td>
								<td><?php echo $tk["Email"] ?></td>
								<td><?php echo $tk["TenDangNhap"] ?></td>
								<?php if ($tk["QuyenHan"] == 0){  ?>
									<!-- Nội dung nếu quyền hạn bằng 0 -->
									<td>	Người dùng</td>
								<?php  }else { ?>
									<!-- Nội dung nếu quyền hạn không bằng 0 -->
									<td>	Quản trị viên</td>
								<?php } ?>
								<td class="text-center">
									<?php if($tk["KichHoat"] == 1) { ?>
										<a href="index.php?action=duyet&id=<?php echo $tk["id"] ?>&tt=<?php echo $tk["KichHoat"] ?>"><i class="bi bi-check-circle"></i></a>
									<?php } else { ?>
										<a href="index.php?action=duyet&id=<?php echo $tk["id"] ?>&tt=<?php echo $tk["KichHoat"] ?>"><i class="bi bi-x-circle text-danger"></i></a>
									<?php } ?>
								</td>
								<td class="text-center"><a href="index.php?action=sua&id=<?php echo $tk["id"]?>"><i class="bi bi-pencil-square"></i></a></td>
								<td class="text-center"><a href="index.php?action=xoa&id=<?php echo $tk["id"]?>" onclick="return confirm('Bạn có muốn xóa chủ đề <?php echo $tk['HoTen']?> không?');"><i class="bi bi-trash text-danger"></i></a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	
	<?php include("../../public/inc/bottom.php")?>
</body>
</html>