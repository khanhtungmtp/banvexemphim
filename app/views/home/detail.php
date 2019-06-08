<!-- header.php ở đây -->

		<!-- chi tiết tin -->
			<div class="container">
				<div class="product-view">
					<div class="product-essential">
						<div class="page-title product-view">
							<span class="h1">Chi tiết phim</span>
						</div>	

						<div class="product-name-reponsive">
							<h1><?php echo $data['getDetail']->title ?></h1>
						</div>

						<div class="product-img-box">		
							<div class="product-image product-image-zoom">
								<div class="product-image-gallery">
									<img id="image-main" class="gallery-image visible" src="<?php echo BASE_URL.'/'.$data['getDetail']->hinh; ?>">

								</div>
							</div>

						</div>

						<div class="product-shop">
							<div class="product-name">
								<span class="h1"><?php echo $data['getDetail']->title ?></span>
							</div>

							<!-- Build test -->
							<div class="movie-director movie-info">
								<label>Đạo diễn: </label>
								<div class="std">&nbsp; <?php echo $data['getDetail']->daodien; ?></div>
							</div>			
							<div class="movie-actress movie-info">
								<label>Diễn viên:</label>
								<div class="std">&nbsp; <?php echo $data['getDetail']->dienvien; ?></div>
							</div>			
							<div class="movie-genre movie-info">
								<label>Thể loại: </label>
								<div class="std">&nbsp; <?php echo $data['getDetail']->titleCat; ?></div>
							</div>
							<div class="movie-release movie-info">
								<label>Khởi chiếu: </label>
								<div class="std">&nbsp; 
									<?php 
									// chuyển về ngày tháng năm
									$khoichieu=date("d-m-Y", strtotime($data['getDetail']->khoichieu)); 
									echo $khoichieu;
							 		?>
							 	</div>
							</div>
							<div class="movie-actress movie-info">
								<label>Thời lượng: </label>
								<div class="std">&nbsp; <?php echo $data['getDetail']->thoiluong; ?> phút</div>
							</div>
							<div class="movie-language movie-info">
								<label>Ngôn ngữ: </label>
								<div class="std">&nbsp; <?php echo $data['getDetail']->ngonngu; ?></div>
							</div>
							<div class="movie-rating movie-rated-web">
								<label>Rated: </label>
								<div class="std">&nbsp; <?php echo $data['getDetail']->rated; ?></div>
							</div>

							<button type="button" title="Mua vé" class="button btn-booking">
								<span><a href="<?php echo BASE_URL; ?>/index/calendar_view/<?php echo $data['getDetail']->Mid;?>" class='muave'>Mua vé</a></span>
							</button>

						</div>

					</div>


					<div class="clearer"></div>
				</div>

				<div class="product-collateral toggle-content tabs tabs-format-cgv">
					
					<div class="tab-content">    
						<h2>Nội Dung Phim</h2>
						<div class="std">
							<?php echo $data['getDetail']->noidung; ?>
								
						</div>
					</div>
				</div>
				<div class="product-collateral toggle-content tabs tabs-format-cgv">
					
					<div class="tab-content">    
						<h2>Trailer Phim</h2>
						<div class="std">
						<?php $link=YOUTUBE.$data['getDetail']->trailer_url; ?>
							<iframe width="560" height="315" src="<?php echo $link ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
								
						</div>
					</div>
				</div>

				</div>
			</div>
		
		<hr style="border-bottom: 3px solid #241d1e;">
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