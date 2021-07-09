<?php

use App\Core\App;
use App\Core\Auth;
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='icon' href='<?= public_url('/favicon.ico') ?>' type='image/ico' />
	<title>
		<?= ucfirst($pageTitle) . " | " . App::get('config')['app']['name'] ?>
	</title>

	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,800,800i,900,900i" rel="stylesheet">
	<!-- Icons -->
	<link rel="stylesheet" href="<?= public_url('/assets/argon/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
	<link rel="stylesheet" href="<?= public_url('/assets/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">

	<!-- Argon CSS -->
	<link rel="stylesheet" href="<?= public_url('/assets/argon/css/argon.css?v=1.2.0') ?>" type="text/css">
	<link rel="stylesheet" href="<?= public_url('/assets/argon/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" type="text/css">

	<style>
		body {
			background-color: #eef1f4;
			font-weight: 350;
		}

		.footer {
			background-color: #eef1f4;
		}

		.bg-primary {
			background-color: #0a9e6e !important;
		}

		.dataTables_wrapper {
			padding: 17px 0px 17px 0px;
		}

		.navbar-brand-img {
			max-height: 3rem !important;
		}
	</style>

	<script src="<?= public_url('/assets/argon/vendor/jquery/dist/jquery.min.js') ?>"></script>
	<!-- Core -->
	<script src="<?= public_url('/assets/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?= public_url('/assets/argon/vendor/js-cookie/js.cookie.js') ?>"></script>
	<script src="<?= public_url('/assets/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ?>"></script>
	<script src="<?= public_url('/assets/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ?>"></script>
	<script src="<?= public_url('/assets/argon/vendor/datatables.net-bs4/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?= public_url('/assets/argon/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>

	<!-- Optional JS -->
	<script src="<?= public_url('/assets/argon/vendor/chart.js/dist/Chart.min.js') ?>"></script>
	<script src="<?= public_url('/assets/argon/vendor/chart.js/dist/Chart.extension.js') ?>"></script>

	<?php
	// this will auto include filepond css/js when adding filepond in public/assets
	if (file_exists('public/assets/filepond')) {
		require_once 'public/assets/filepond/filepond.php';
	}
	?>
</head>

<body>

	<!-- Sidenav -->
	<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
		<div class="scrollbar-inner">
			<!-- Brand -->
			<div class="sidenav-header  align-items-center">
				<a class="navbar-brand" href="javascript:void(0)">
					<svg class="navbar-brand-img" height="40pt" preserveAspectRatio="xMidYMid meet" viewBox="0 0 318 305" width="40pt" xmlns="http://www.w3.org/2000/svg">
						<g transform="matrix(.1 0 0 -.1 0 305)" style="fill:#0a9e6e">
							<path d="m1480 2939c-560-43-1059-436-1234-972-92-281-92-601 0-884 27-83 112-265 139-298l17-20-8 20c-4 11-9 63-11 115-3 76-9 105-30 147-35 74-31 163 12 225 45 63 104 90 187 86 82-4 139-39 176-108 20-38 23-56 20-112-5-86-40-141-115-178-50-24-50-25-45-65 9-74 54-136 113-158 14-4 17 5 23 55 13 124 104 341 209 498 85 128 137 191 262 319 196 202 405 358 633 474 228 117 398 167 597 176l130 6-43 32c-23 17-64 36-90 43-48 11-49 11-85-24-47-44-94-59-168-54-194 14-261 270-101 383 89 62 231 40 291-46 23-33 34-39 93-53 71-16 176-64 197-90 8-9 18-16 24-16 7 0-22 34-63 76-301 304-705 456-1130 423z" />
							<path d="m2152 2565c-87-37-84-154 5-191 31-14 38-13 71 3 23 11 44 32 55 55 16 32 16 40 4 70-25 59-81 85-135 63z" />
							<path d="m2690 2416c0-2 8-10 18-17 15-13 16-12 3 4s-21 21-21 13z" />
							<path d="m2756 2317c13-30 27-76 30-103 5-36 16-59 42-88 60-68 86-137 90-250 4-83 8-104 28-134 101-148 60-420-102-678-201-320-516-599-869-770-230-111-385-149-570-142-130 6-200 29-266 87-30 26-61 42-99 51-118 27-217 93-266 175-21 36-32 45-63 50-42 7-153 56-186 82-11 9 25-29 81-84 376-372 927-502 1431-337 418 136 771 489 907 907 111 339 88 721-63 1043-34 71-137 244-146 244-2 0 7-24 21-53z" />
							<path d="m2370 2099c-158-17-384-102-575-216-496-298-865-755-919-1140l-6-42 57 5c126 11 116 4 157 104 59 141 148 277 286 435 228 261 582 501 885 600 86 28 211 55 253 55 27 0 30 4 51 73 24 82 27 116 9 121-32 10-130 12-198 5z" />
							<path d="m2405 1775c-91-20-229-72-335-125-303-152-606-418-779-684-52-79-116-204-109-211 8-8 180 58 293 113 244 119 438 256 639 452 142 138 238 254 315 378 28 45 51 84 51 87 0 6-1 6-75-10z" />
							<path d="m2676 1706c-152-299-452-617-806-854-210-140-493-270-707-322-41-10-42-11-36-48 3-20 7-39 9-41 11-13 175 3 256 23 156 40 191 57 198 92 24 113 149 169 250 113 106-60 106-228 0-288-42-23-114-28-154-10-20 9-40 6-118-21-51-18-133-41-182-51-48-10-90-20-93-22-9-10 85-21 164-19 378 5 942 357 1231 768 57 81 142 222 110 183-48-59-149-77-218-38-106 60-106 228 0 288 21 11 48 21 59 21 18 0 29 14 52 65 27 61 74 213 67 220-1 1-12 5-24 9-18 5-26-4-58-68z" />
							<path d="m2876 1585c-4-16-22-62-40-101-27-57-31-75-22-90 6-10 13-41 16-69l5-50 24 68c28 82 41 178 32 232l-7 40z" />
							<path d="m2640 1367c-46-24-42-90 6-108 27-9 64 9 75 37 17 47-36 93-81 71z" />
							<path d="m502 1245c-87-37-84-154 5-191 31-14 38-13 71 3 23 11 44 32 55 55 16 32 16 40 4 70-25 59-81 85-135 63z" />
							<path d="m1730 577c-46-24-42-90 6-108 27-9 64 9 75 37 17 47-36 93-81 71z" />
							<path d="m960 495c0-2 14-11 30-20 29-15 30-15 30 5 0 16-7 20-30 20-16 0-30-2-30-5z" />
						</g>
					</svg>
				</a>
			</div>
			<div class="navbar-inner">
				<!-- Collapse -->
				<div class="collapse navbar-collapse" id="sidenav-collapse-main">
					<!-- Nav items -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="<?= route('/home') ?>">
								<i class="ni ni-tv-2 text-primary"></i>
								<span class="nav-link-text">Dashboard</span>
							</a>
						</li>
						<?php
						if (Auth::user('role_id') == 1) {
						?>
							<li class="nav-item">
								<a class="nav-link" href="<?= route('/deduction') ?>">
									<i class="fas fa-calculator text-red"></i>
									<span class="nav-link-text">Late Deduction</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= route('/entry') ?>">
									<i class="fas fa-clock text-orange"></i>
									<span class="nav-link-text">Late Entry</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= route('/payment') ?>">
									<i class="fas fa-file-invoice-dollar text-green"></i>
									<span class="nav-link-text">Payment</span>
								</a>
							</li>
						<?php  } ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= route('/history') ?>">
								<i class="fas fa-list-ol text-orange"></i>
								<span class="nav-link-text">Late history</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= route('/payment/history') ?>">
								<i class="fas fa-search-dollar text-green"></i>
								<span class="nav-link-text">Payment History</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= route('/summary') ?>">
								<i class="fas fa-receipt text-orange"></i>
								<span class="nav-link-text">Late Summary</span>
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</nav>

	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom" style="position: sticky;top: 0;z-index: 100;">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Navbar links -->
					<ul class="navbar-nav align-items-center  ml-md-auto ">
						<li class="nav-item d-xl-none">
							<!-- Sidenav toggler -->
							<div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
								<div class="sidenav-toggler-inner">
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
									<i class="sidenav-toggler-line"></i>
								</div>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
						<li class="nav-item dropdown">
							<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class="media align-items-center">
									<div class="media-body  ml-2  d-none d-lg-block">
										<span class="mb-0 text-sm  font-weight-bold"><?= Auth::user('fullname') ?></span>
									</div>
								</div>
							</a>
							<div class="dropdown-menu  dropdown-menu-right ">
								<div class="dropdown-header noti-title">
									<h6 class="text-overflow m-0">Welcome!</h6>
								</div>
								<a href="<?= route('/profile') ?>" class="dropdown-item">
									<i class="ni ni-single-02"></i>
									<span>My profile</span>
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= route('/logout') ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="ni ni-user-run"></i>
									<span>Logout</span>
								</a>

								<form id="logout-form" action="<?= route('/logout') ?>" method="POST" style="display:none;">
									<?= csrf() ?>
								</form>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<!-- Header -->
		<div class="header pb-6" style="z-index: -1;background-color: #eef1f4;">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 d-inline-block mb-0"><?= $pageTitle ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Page content -->
		<div class="container-fluid mt--6">