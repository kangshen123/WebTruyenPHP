<?php include("../../public/inc/head.php")?>
<body>
	<div class="container">
	<?php include("../../public/inc/top.php")?>
		<div class="card mt-3">
			<div class="card-header">Truyện</div>
			<div class="card-body table-responsive">
				<a href="index.php?action=them" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Đăng truyện</a>
				<table class="table table-bordered table-hover table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">STT</th>
                            <th width="10%">Avatar</th>
							<th width="15%">Người đăng</th>
							<th width="15%">Thể loại</th>
							<th width="15%">Tiêu đề</th>
							<th width="10%">Số chương</th>
							<th width="10%">Ngày đăng</th>
							<th width="10%">Tác giả</th>
							<th width="5%" title="Tình trạng kiểm duyệt?">Duyệt?</th>
							<!--<th width="5%">Chương truyện</th>-->
							<th width="5%">Sửa</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php $stt = 0; ?>
						<?php foreach($tr as $tr){ ?>
							<?php $tk = $TaiKhoan->laydulieutheoid($tr['NguoiDang'])?>
							<?php $tg = $TacGia->laydulieutheoid($tr['IdTacGia'])?>
							<?php $tl = $TheLoai->laydulieutheoid($tr['TheLoai'])?>
							<tr>
								<td class="align-middle"><?php echo $stt = $stt + 1 ?></td>
								<td class="align-middle small">
										<a href="index.php?action=chitiet&id=<?php echo $tr["ID"]?>">
											<img class="fit-img" src="../../<?php echo $tr["HinhAnh"] ?>">
										</a>
								</td> 
								<td class="align-middle small"><?php echo $tk["HoTen"] ?></td>
								<td class="align-middle small"><?php echo $tl["TenTheLoai"] ?></td>
								<td class="align-middle small"><?php echo $tr["TieuDe"] ?></td>
								<td class="align-middle small"><?php echo $tr["SoChuong"] ?></td>
								<td class="align-middle small"><?php echo $tr["NgayDang"] ?></td>
								<td class="align-middle small"><?php echo $tg["TenTacGia"] ?></td>
								<td class="align-middle text-center">
									<?php if($tr["KiemDuyet"] == 1) { ?>
										<a href="index.php?action=duyet&id=<?php echo $tr["ID"]?>&tt=<?php echo $tr["KiemDuyet"] ?>"><i class="bi bi-check-circle"></i></a>
									<?php } else { ?>
										<a href="index.php?action=duyet&id=<?php echo $tr["ID"]?>&tt=<?php echo $tr["KiemDuyet"] ?>"><i class="bi bi-x-circle text-danger"></i></a>
									<?php } ?>
								</td>
								<!--<td class="align-middle text-center"><a href="/chuong/cuatoi"><i class="bi bi-pencil-square"></i></a></td>-->
								<td class="align-middle text-center"><a href="index.php?action=sua&id=<?php echo $tr["ID"]?>"><i class="bi bi-pencil-square"></i></a></td>
								<td class="align-middle text-center"><a href="index.php?action=xoa&id=<?php echo $tr["ID"]?>" onclick="return confirm('Bạn có muốn xóa bài viết <?php echo $tr['TieuDe'] ?> không?');"><i class="bi bi-trash text-danger"></i></a></td>
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