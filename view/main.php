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
            <?php for ($i = 1; $i <= 10 ; $i++) 
				echo "<a class='p-2 link-secondary text-decoration-none' href='#'>Thể loại</a>";
            ?>
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
	<?php include("include/bottom.php") ?>
</body>
</html>