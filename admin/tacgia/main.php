<?php include("../../public/inc/head.php")?>
<?php $id=0?>
<body>
	<div class="container">
	<?php include("../../public/inc/top.php")?>
		<div class="card mt-3">
			<div class="card-header">Tác giả</div>
			<div class="card-body table-responsive">
				<a href="index.php?action=them" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Thêm mới</a>
				<table class="table table-bordered table-hover table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th>Tên tác giả</th>
							<th width="5%">Sửa</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
					
                    <?php foreach ($tg as $tg) { ?>
						<?php $id = $id + 1?>						
							<tr>
								<th><?php echo $id?></th>
								<td><?php echo $tg["TenTacGia"]?></td>
								<td class="text-center"><a href="index.php?action=sua&id=<?php echo $tg["id"]?>"><i class="bi bi-pencil-square"></i></a></a></td>
								<td class="text-center"><a href="index.php?action=xoa&id=<?php echo $tg["id"]?>" onclick="return confirm('Bạn có muốn xóa chủ đề <?php echo $tg['TenTacGia']?> không?');"><i class="bi bi-trash text-danger"></i></a></td>
							</tr>
                    <?php }?>
					</tbody>
				</table>
			</div>
		</div>	
	</div>
	<?php include("../../public/inc/bottom.php")?>
</body>

</html>