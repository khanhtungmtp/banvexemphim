<!-- header.php ở đây -->


	<!-- slide -->
	<div class="container"> 
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<img src="<?php echo BASE_URL;?>/public/img/banner/0.jpg" alt="Los Angeles" style="width:100%;">
				</div>

				<div class="item">
					<img src="<?php echo BASE_URL;?>/public/img/banner/5.jpg" alt="Chicago" style="width:100%;">
				</div>

				<div class="item">
					<img src="<?php echo BASE_URL;?>/public/img/banner/3.jpg" alt="New york" style="width:100%;">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

<!-- sản phẩm -->
<div class="container">
<div class="home-movie-selection">
	<div class="home-title">
		<h2>movie selection</h2>
	</div>

	
	<div class="category-products cgv-movies" style="padding-left: 70px">


		<ul class="products-grid products-grid--max-4-col first last odd">

			<?php foreach ($data['getMovie'] as $value): ?>
				<li class="film-lists item last">
					<div class="ribon position-1"></div>

					<div class="product-images">
						<a href="<?php echo BASE_URL;?>/detail/<?php echo $value->id; ?>" title="<?php echo $value->title;?>" class="product-image">
						
							<img id="product-collection-image-1106" src="<?php echo $value->hinh;?>" alt="<?php echo $value->title;?>">
						</a>

					</div>

					<div class="product-info" style="max-height: none; height: 96px; min-height: 55px;">
						<h2 class="product-name"><a href="<?php echo BASE_URL;?>/detail/<?php echo $value->id; ?>" title="<?php echo $value->title;?>"><?php echo $value->title;?></a></h2>

						<div class="cgv-movie-info">
							<span class="cgv-info-bold">Thể loại: </span>
							<span class="cgv-info-normal"><?php echo $value->titleCat;?></span>
						</div>

						<div class="cgv-movie-info">
							<span class="cgv-info-bold">Thời lượng: </span>
							<span class="cgv-info-normal"><?php echo $value->thoiluong;?> phút</span>
						</div>

						<div class="cgv-movie-info">
							<span class="cgv-info-bold">Khởi chiếu: </span>
							<span class="cgv-info-normal">
								<?php 
								// chuyển về ngày tháng năm
									$ngaykhoichieu=date("d-m-Y", strtotime($value->khoichieu)); 
									echo $ngaykhoichieu;
							 	?>					
							 </span>
						</div>
					</div>

					<ul class="add-to-links">

						<li>
							<button type="button" title="Chi tiết" class="button btn-booking" style="margin: 6px 56px"><span><span><a href="<?php echo BASE_URL;?>/detail/<?php echo $value->id; ?>">Chi tiết</a></span></span>
							</button>
						</li>

					</ul>
				</li>
			<?php endforeach; ?>


		</ul>

	</div>

</div>
</div>

	<!-- cuối trang -->
	<div class="footer">
		<div class="footer-cgv-address">
			<div class="cgv-address-content">
				<div class="logo-footer-cgv">&nbsp;</div>
				<div class="text-cgv-address">
					<h3>Đồ án môn Công nghệ phần mềm</h3>
					<p>Đề tài website bán vé xem phim online</p>
					<p>Nhóm 7 lớp D15C02A</p>
					<p>Hotline: 0338716085</p>
					<p>COPYRIGHT 2018 Nguyễn khanh tùng .</p>
				</div>
			</div>
		</div>	
	</div>



<!-- footer.php ở đây -->