<?php include("../../public/inc/head.php")?>

<body>
	<div class="container">
    <?php include("../../public/inc/top.php")?>
		
		<div class="card mt-3">
			<div class="card-header">Chương</div>
			<div class="card-body table-responsive">
				<a href="index.php?action=them" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Đăng chương</a>
				<table class="table table-bordered table-hover table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">STT</th>
							<th width="15%">Người đăng</th>
							<th width="15%">Truyện</th>
                            <th width="10%">Tên Chương</th>
                            <th width="10%">Ngày đăng</th>
							<th width="5%" title="Tình trạng kiểm duyệt?">Duyệt?</th>
							<th width="5%">Sửa</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php  $stt = 0; ?>
						<?php foreach($ch as $ch){ ?>
                            <?php $tk = $TaiKhoan->laydulieutheoid($ch['NguoiDang'])?>
							<?php $tr = $Truyen->laydulieutheoid($ch['idTruyen'])?>
							<tr>
								<td class="align-middle"><?php echo $stt = $stt+1 ?></td>
								<td class="align-middle small"><?php echo $tk["HoTen"] ?></td>
								<td class="align-middle small"><?php echo $tr["TieuDe"] ?></td>
								<td class="align-middle small"><?php echo $ch["TieuDe"] ?></td>
								<td class="align-middle small"><?php echo $ch["NgayDang"] ?></td>
								<td class="align-middle text-center">
									<?php if($ch["KiemDuyet"] == 1) {?>
										<a href="index.php?action=duyet&id=<?php echo $ch["id"]?>&tt=<?php echo $ch["KiemDuyet"] ?>"><i class="bi bi-check-circle"></i></a>
									<?php } else { ?>
										<a href="index.php?action=duyet&id=<?php echo $ch["id"]?>&tt=<?php echo $ch["KiemDuyet"] ?>"><i class="bi bi-x-circle text-danger"></i></a>
									<?php } ?>
								</td>
								
								<td class="align-middle text-center"><a href="index.php?action=sua&id=<?php echo $ch["id"]?>"><i class="bi bi-pencil-square"></i></a></td>
								<td class="align-middle text-center"><a href="index.php?action=xoa&id=<?php echo $ch["id"]?>" onclick="return confirm('Bạn có muốn xóa bài viết <?php echo $ch['TieuDe'] ?> không?');"><i class="bi bi-trash text-danger"></i></a></td>
							</tr>
                        <?php }?>
					</tbody>
				</table>
			</div>
		</div>
		
		<?php include("../../public/inc/bottom.php")?>
	</div>
</body>

</html>