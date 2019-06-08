
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đồ án website bán vé cgv</title>
	<link rel="stylesheet" href="<?php echo BASE_URL;?>/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/public/css/cgv1.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/public/css/custom-cgv.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>/public/css/style.css">
</head>
<body>

	<header id="header" class="page-header">
		<div class="page-header-container">
			<a class="logo" href="<?php echo BASE_URL;?>">
				<img src="<?php echo BASE_URL;?>/public/img/cgvlogo.png" alt="CGV Cinemas" class="large">
				<img src="<?php echo BASE_URL;?>/public/img/cgvlogo-small.png" alt="CGV Cinemas" class="small">
			</a>

			<!-- Navigation -->
			<div id="header-nav" class="skip-content">
				<nav id="nav">
					<ol class="nav-primary">
						<li class="level0 nav-1 first last parent"><a href="<?php echo BASE_URL;?>" class="level0 has-children">Home</a></li>			

						<li class="level0 nav-2 parent first last">
							<a class="level0 has-children" id="phim">Phim</a>
						</li>

						<li class="level0 nav-4 parent first last">
							<a class="level0 has-children" href="">Rạp CGV</a>
						</li>
						<?php
                        Session::init();
                        $session_user=Session::getSession('fullname');
                            // nếu tồn tại session thì in ra tên
                            if ($session_user==true) {
                                ?>
						<!-- user login dropdown start-->
				          <li class="dropdown">
				            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
	                            <span class="profile-ava">
	                                <img alt="" src="">
	                            </span>
	                            <span class="username"><?php echo $session_user; ?></span>
	                            <b class="caret"></b>
	                        </a>
				            <ul class="dropdown-menu extended logout">
				              <div class="log-arrow-up"></div>
				              <li class="eborder-top">
				                <a href="<?php echo BASE_URL; ?>/index/profile"><i class="icon_profile"></i> Hồ sơ</a>
				              </li>
				              
				              <li>
				                <a href="<?php echo BASE_URL; ?>/index/logout"><i class="icon_key_alt"></i> Đăng xuất</a>
				              </li>
				              
				            </ul>
				          </li>
				          <!-- user login dropdown end -->
						<?php
                            } else {
                                ?>
						<li class="level0 nav-1 first last parent"><a href="<?php echo BASE_URL; ?>/index/register" class="level0 has-children">Đăng ký</a>
						</li>

						<li class="level0 nav-1 first last parent"><a href="<?php echo BASE_URL; ?>/index/login" class="level0 has-children">Đăng nhập</a>
						</li>
						<?php
                            } ?>
					</ol>
				</nav>

			</div>
			<!-- Search -->
			<div id="header-search" class="skip-content">

				<div class="header-search-left">
					<p><a href=""><img alt="" src="<?php echo BASE_URL;?>/public/img/tin-moi-uu-dai.gif"></a></p>
					<form id="search_mini_form" action="" method="get">

						<div class="input-box">
							<label for="search">Search:</label>
							<input id="search" type="search" name="q" value="" class="input-text required-entry" maxlength="128" placeholder="Tìm kiếm" autocomplete="off">
							<button type="submit" title="Tìm kiếm" class="button search-button"><span><span>Tìm kiếm</span></span></button>
						</div>

					</form>
				</div>

				<div class="header-search-right">
					<p><a href=""><img alt="" src="<?php echo BASE_URL;?>/public/img/mua-ve_ngay.png"></a></p></div>

				</div>

			</div>
		</header>
		