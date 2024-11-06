<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Trang Chủ</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
	<style>
		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 3rem;
			overflow-y: hidden;
		}
		
		.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: 3px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
		}
		
		.card-img-right {
			height: 100%;
			border-radius: 0 3px 3px 0;
			object-fit: cover;
		}
		
		.h-250 {
			height: 300px;
		}
		
		@media (min-width: 768px) {
			.h-md-250 { height: 300px; }
		}
	</style>
</head>
<body>
    <?php include("include/top.php")?>
    <div class="nav-scroller py-1 mb-2">
			<nav class="nav d-flex justify-content-between">
            <?php foreach ($tl as $tl) { ?>
				<a class='p-2 link-secondary text-decoration-none' href='#'><?php echo $tl["TenTheLoai"]?></a>
            <?php }?>
			</nav>
	</div>
	<div class="p-5 p-md-5 mb-4 text-white rounded bg-dark">
				<div class="col-12 px-0">
					<h1 class="display-5">Truyện A</h1>
					<img src="..">
					<p class="lead my-3">Mẫu</p>
					<p class="lead mb-0"><a href="#" class="text-white fw-bold text-decoration-none">Đọc tiếp...</a></p>
				</div>
	</div>
	<div class="row">
			
				<?php for ($i=0; $i<10 ; $i++) {?>
					<div class="col-md-6">
						<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
							<div class="col p-3 d-flex flex-column position-static">
								<strong class="d-inline-block mb-2 text-primary">Tên truyện</strong>
								<h4 class="mb-0">Thể loại</h4>
								<div class="mb-1 text-muted">Ngày đăng</div>
								<p class="card-text my-2">Tóm tắt</p>
								<a href="/novel/chitiet/<%= tr._id %>" class="stretched-link text-decoration-none">Đọc tiếp...</a>
							</div>
							<div class="col-auto d-none d-lg-block">
								<img src = "#" class="card-img-right" width="200">
							</div>
						</div>
					</div>
				<?php } ?>
			
	</div>
	<?php include("include/bottom.php") ?>
</body>
</html>