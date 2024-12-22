<?php include("../../public/inc/head.php")?>

<body>
	<div class="container">
    <?php include("../../public/inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Profile</div>
			<div class="card-body table-responsive">
				<table class="table table-bordered table-hover table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">STT</th>
							<th width="15%">Họ và tên người dùng</th>
							<th width="15%">Email</th>
							<th width="20%">Tên đăng nhập</th>
							<th width="10%">Quyền hạn</th>
							<th width="10%" title="Tình trạng tài khoản?">Kích hoạt?</th>
							<!--<th width="5%">Chương truyện</th>-->
							<th width="5%">Sửa</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php  $stt = 1; ?>
							<tr>
								<td class="align-middle"><?php echo $stt++; ?></td>
								<td class="align-middle small"><?php echo $tk["HoTen"] ?></td>
								<td class="align-middle small"><?php echo $tk["Email"] ?></td>
								<td class="align-middle small"><?php echo $tk["TenDangNhap"] ?></td>
								<td class="align-middle small"><?php echo $tk["QuyenHan"] ?></td>
								<td class="align-middle text-center">
									<?php if($tk["KichHoat"] == 1) { ?>
										<i class="bi bi-check-circle"></i>
									<?php } else { ?>
										<i class="bi bi-x-square text-danger"></i>
									<?php } ?>
								</td>
								<!--<td class="align-middle text-center"><a href="/chuong/cuatoi"><i class="bi bi-pencil-square"></i></a></td>-->
								<td class="align-middle text-center"><a href="index.php?action=sua&id=<?php echo $tk['id']?>"><i class="bi bi-pencil-square"></i></a></td>
								<td class="align-middle text-center"><a href="index.php?action=xoa&id=<?php echo $tk['id']?>" onclick="return confirm('Bạn có muốn xóa tài khoản của mình không?');"><i class="bi bi-trash text-danger"></i></a></td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
	
	<?php include("../../public/inc/bottom.php")?>
</body>

</html>