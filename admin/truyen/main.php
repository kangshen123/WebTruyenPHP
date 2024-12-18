<?php include("../inc/head.php")?>
<body>
	<div class="container">
        <?php include("../inc/top.php")?>
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
							<th width="40%">Tiêu đề</th>
							<th width="10%">Số chương</th>
							<th width="10%">Ngày đăng</th>
							<th width="5%" title="Tình trạng kiểm duyệt?">Duyệt?</th>
							<!--<th width="5%">Chương truyện</th>-->
							<th width="5%">Sửa</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php $stt = 0; ?>
						<?php foreach($tr as $tr){ ?>
							<tr>
								<td class="align-middle"><?php echo $stt++ ?></td>
                                <td class="align-middle small"><img class="fit-img" src="../../<?php echo $tr["HinhAnh"] ?>"></td>
								<td class="align-middle small"><?php echo $tr["TieuDe"] ?></td>
								<td class="align-middle small"><?php echo $tr["NguoiDang"] ?></td>
								<td class="align-middle small"><?php echo $tr["TieuDe"] ?></td>
								<td class="align-middle small"><?php echo $tr["SoChuong"] ?></td>
								<td class="align-middle small"><?php echo $tr["NgayDang	"] ?></td>

								<td class="align-middle text-center">
									<?php if($tr["KiemDuyet"] == 1) { ?>
										<a href="/novel/duyet/<%= tr._id %>"><i class="bi bi-check-circle"></i></a>
									<?php } else { ?>
										<a href="/novel/duyet/<%= tr._id %>"><i class="bi bi-x-circle text-danger"></i></a>
									<?php } ?>
								</td>
								<!--<td class="align-middle text-center"><a href="/chuong/cuatoi"><i class="bi bi-pencil-square"></i></a></td>-->
								<td class="align-middle text-center"><a href="/novel/sua/<%= tr._id %>"><i class="bi bi-pencil-square"></i></a></td>
								<td class="align-middle text-center"><a href="/novel/xoa/<%= tr._id %>" onclick="return confirm('Bạn có muốn xóa bài viết <%= tr.TieuDe %> không?');"><i class="bi bi-trash text-danger"></i></a></td>
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