<?php include("../../public/inc/head.php")?>
<?php $id=0?>
<body>
	<div class="container">
    	<?php include("../../public/inc/top.php")?>
		<div class="card mt-3">
			<div class="card-header">Thể loại</div>
			<div class="card-body table-responsive">
				<a href="index.php?action=them" class="btn btn-primary mb-2"><i class="bi bi-plus-lg"></i> Thêm mới</a>
				<table class="table table-bordered table-hover table-sm mb-0">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th>Tên thể loai</th>
							<th width="5%">Sửa</th>
							<th width="5%">Xóa</th>
						</tr>
					</thead>
					<tbody>
					
                    <?php foreach ($tl as $tl) { ?>
						<?php $id = $id + 1?>						
							<tr>
								<th><?php echo $id?></th>
								<td><?php echo $tl["TenTheLoai"]?></td>
								<td class="text-center"><a href="index.php?action=sua&id=<?php echo $tl["id"]?>"><i class="bi bi-pencil-square"></i></a></a></td>
								<td class="text-center"><a href="index.php?action=xoa&id=<?php echo $tl["id"]?>" onclick="return confirm('Bạn có muốn xóa chủ đề <?php echo $tl['TenTheLoai']?> không?');"><i class="bi bi-trash text-danger"></i></a></td>
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