<?php include("../public/inc/head.php")?>
<?php $randomNumber = mt_rand(1, 8); ?>
<body>
	<div class="container">
    <?php include("../public/inc/top.php")?>
    <div class="nav-scroller py-1 mb-2">
			<nav class="nav d-flex justify-content-between">
            <?php foreach ($tl as $tl) { ?>
				<a class='p-2 link-secondary text-decoration-none' href='#'><?php echo $tl["TenTheLoai"]?></a>
            <?php }?>
			</nav>
	</div>
	<div class="p-5 p-md-5 mb-4 text-white rounded bg-dark">
				<div class="col-12 px-0">
					<h1 class="display-5">Đêm ấy là một đêm đầy sao</h1>
					<p class="lead my-3">Hãy để ta chiếm lấy một nửa cơ thể ngươi, đổi lại ngươi sẽ có sức mạnh vô song, có thể thống trị toàn cõi-----" "Tôi từ chối !" Ai lại có thể từ chối một lời đề nghị từ ác quỷ chứ, nhưng nhân vật chính của chúng ta lại thẳng thừng làm điều đó không một chút do dự. "Nhưng ngươi sẽ có sức mạnh, quyền lực, ngươi không muốn à ?" "Ta nói không ở đây chính là không phải là cơ thể ta, ta sẽ tìm cho ngươi một cơ thể mới, giờ ngươi chỉ có thể chiếm lấy con mắt của ta thôi." Lời nói của cậu khiến con quỷ ngã ngửa ra và miễn cưỡng chấp nhận lời kèo. Và từ đây, cuộc hành trình của hai người, à không, một người một quỷ chính thức bắt đầu !</p>
					<p class="lead mb-0"><a href="#" class="text-white fw-bold text-decoration-none">Đọc tiếp...</a></p>
				</div>
	</div>
	<div class="row">
				<?php for ($i=1; $i<=8 ; $i++) {?>
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
								<img src = "../public/img/<?php echo $i ?>.jpg" class="card-img-right" width="200">
							</div>
						</div>
					</div>
				<?php } ?>
			
		</div>
		<?php include("../public/inc/bottom.php")?>
	</div>
	
</body>
</html>