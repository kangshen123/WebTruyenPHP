<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/navbar.css">
    <title>MoiTruyen</title>
</head>
<body>
    <!-- Thanh điều hướng sẽ được thêm ở đây -->
        <nav class="navbar navbar-expand-lg navbar-dark navcolor">
    <a class="navbar-brand" href="/">
        <img src="../../public/img/superheroe-svgrepo-com.svg" alt="Logo" width="30" height="30" class="d-inline-block align-text-top" />
        MoiNovel
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link"  href="#"><i class="bi bi-compass"></i> Top Tuần</a>
        </li>
        <?php if(!isset($_SESSION['nguoidung'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../taikhoan/index.php?action=dangnhap">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../taikhoan/index.php?action=dangki">Đăng kí</a>
                    </li>
        <?php } else { ?>
            <?php if($_SESSION['nguoidung']["QuyenHan"] == 1) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear"></i> Quản lý
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../theloai/index.php"><i class="bi bi-card-checklist"></i> Thể loại</a></li>
                        <li><a class="dropdown-item" href="../tacgia/index.php"><i class="bi bi-card-checklist"></i> Tác giả</a></li>
                        <li><a class="dropdown-item" href="../taikhoan/index.php"><i class="bi bi-people"></i> Tài khoản</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="../truyen/index.php"><i class="bi bi-file-earmark-richtext"></i>Truyện</a></li>
                        <li><a class="dropdown-item" href="../chuong/index.php"><i class="bi bi-file-earmark-richtext"></i> Chương</a></li>
                    </ul>
                    <li class="nav-item">
						<a class="nav-link" href="../taikhoan/index.php?action=dangxuat"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>
			        </li>
                </li>
            <?php } else { ?>
                <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<i class="bi bi-person"></i> <?php echo $_SESSION['nguoidung']["HoTen"] ?> 
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="../truyen/index.php?action=them"><i class="bi bi-file-earmark-plus"></i> Đăng truyện</a></li>
							<li><a class="dropdown-item" href="../truyen/index.php?action=truyencuatoi&id=<?php echo $_SESSION["nguoidung"]["id"]?>"><i class="bi bi-journal-bookmark"></i> Truyện của tôi</a></li>
							<li><a class="dropdown-item" href="../chuong/index.php?action=chuongcuatoi&id=<?php echo $_SESSION["nguoidung"]["id"]?>"><i class="bi bi-journal-bookmark"></i> Chương truyện của tôi</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="../taikhoan/index.php?action=profile&id=<?php echo $_SESSION["nguoidung"]["id"]?> "><i class="bi bi-person-badge"></i> Hồ sơ cá nhân</a></li>
						</ul>
					</li>
                <li class="nav-item">
						<a class="nav-link" href="../taikhoan/index.php?action=dangxuat"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>
			    </li>
            <?php } ?>
           
        <?php } ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>