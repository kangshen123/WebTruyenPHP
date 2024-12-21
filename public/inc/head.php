<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Trang quản lý </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
	<style>
		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 3rem;
			overflow-y: hidden;
		}
		.fit-img {
            width: 100px;
            height: 50px;
            object-fit: cover; /* Cắt ảnh để lấp đầy khung */
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