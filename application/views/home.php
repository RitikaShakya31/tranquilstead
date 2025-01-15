<!-- contain main informative part of the site -->
<main id="main" role="main">
	<!-- <div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<section class="main-gallery">
						<div class="mask">
							<div class="slideset">
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/3.jpg" alt="image description" />
									</div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h1 class="heading"><a href="whyNashik.php">WHY NASHIK
														??</a></h1>
												<ul class="add-nav list-inline">
													<li><a href="travel.php">TRAVELING</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/2 (2).jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2 class="heading"><a href="whyNashik.php">WHY NASHIK
														??</a></h2>
												<ul class="add-nav list-inline">
													<li><a href="lifestyle.php">LIFESTYLE</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/1.jpg" alt="image description" />
									</div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2 class="heading"><a href="whyNashik.php">WHY NASHIK
														??</a></h2>
												<ul class="add-nav list-inline">
													<li><a href="religious.php">RELIGIOUS</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
						<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
					</section>
				</div>
			</div>
		</div>
	</div> -->

	<!-- ---dynamic content--- -->
	<div class="container-fluid">
		<div class="row">
			<?php
			// Check if $cat array exists and is not empty
			if (!empty($cat)) {
				$count = 0;
				foreach ($cat as $c) {
					$getPro = $this->CommonModal->getRowByMoreId('slider_image', ['category_id' => $c['category_id']]);
					$getSub = $this->CommonModal->getRowByMoreId('sub_category', ['category_id' => $c['category_id']]);
					// Determine the column size based on the count
					if ($count == 0) {
						$col_size = 'col-sm-12';
					} elseif ($count < 3) {
						$col_size = 'col-sm-6';
					} else {
						$col_size = 'col-sm-4';
					}
					?>
					<div class="<?= $col_size; ?> col-xs-12 two-cols">
						<div class="row">
							<section class="main-gallery">
								<div class="mask">
									<div class="slideset">
										<?php if (!empty($getPro)) {
											foreach ($getPro as $pro) { ?>
												<div class="slide">
													<div class="bg-stretch">
														<img src="<?= base_url('upload/category/') . $pro['image_path']; ?>"
															alt="<?= $c['category_name']; ?>" />
													</div>
													<div class="post-over">
														<div class="box">
															<div class="block">
																<h2><a
																		href="<?= strtolower(str_replace(' ', '_', $c['category_name'])); ?>.php"><?= strtoupper($c['category_name']); ?></a>
																</h2>
																<ul class="add-nav list-inline">
																	<?php if (!empty($getSub)) {
																		foreach ($getSub as $sub) { ?>
																			<li><a href="<?= base_url('datails/') . $sub['sub_category_id']?>"><?= $sub['sub_category_name']; ?></a></li>
																		<?php }
																	} ?>
																</ul>
															</div>
														</div>
													</div>
												</div>
											<?php }
										} else { ?>
											<div class="slide">
												<div class="bg-stretch">
													<img src="<?= !empty($c['banner']) ? $c['banner'] : 'assets/images/default.jpg'; ?>"
														alt="<?= $c['category_name']; ?>" />
												</div>
												<div class="post-over">
													<div class="box">
														<div class="block">
															<h2><a
																	href="<?= strtolower(str_replace(' ', '_', $c['category_name'])); ?>.php"><?= strtoupper($c['category_name']); ?></a>
															</h2>
															<ul class="add-nav list-inline">
																<li><a href="#"><?= $c['sub_name']; ?></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
									</div>
									<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
									<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
								</div>
							</section>
						</div>
					</div>
					<?php
					$count++;
				}
			} else {
				// Display message if no categories are available
				echo '<p>No data available to display.</p>';
			}
			?>
		</div>
	</div>
	<!-- ---dynamic content--- -->

	<!-- <div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-xs-12 two-cols">
				<div class="row">
					<section class="main-gallery">
						<div class="mask">
							<div class="slideset">
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/ganpati.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="religious.php">RELIGIOUS PLACES</a></h2>
												<ul class="add-nav list-inline">
													<li><a href="ganpati.php">MANACHE GANPATI</a></li><br>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/trambakB.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="religious.php">RELIGIOUS PLACES</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="trimbak.php">TRIMBAKESHWAR TEMPLE</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/gondeshwar.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="religious.php">RELIGIOUS PLACES</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="gondeshwar.php">GONDESHWAR TEMPLE</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/jainmandir/jain.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="religious.php">RELIGIOUS PLACES</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="vilholi.php">VILHOLI JAIN MANDIR</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/pandavleni/caves.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="religious.php">RELIGIOUS PLACES</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="leni.php">PANDAVLENI CAVES</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/kalaram1.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="religious.php">RELIGIOUS PLACES</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="kalaram.php">KALARAM MANDIRX</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
						<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
					</section>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12 two-cols">
				<div class="row">
					<section class="main-gallery">
						<div class="mask">
							<div class="slideset">
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/sadhana/sadhana.jpeg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="lifeStyle.php">LIFE STYLE</a></h2>
												<ul class="add-nav list-inline">
													<li><a href="sadhnamisal.php">SADHANA CHULIVARCHI
															MISAL</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/mauli/samosa.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="lifeStyle.php">LIFE STYLE</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="mauli.php">MAULI KADHI SAMOSA</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/sham/sham1.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="lifeStyle.php">LIFE STYLE</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="shamsundar.php">SHAMSUNDAR MISAL</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/tushar/unnamed.webp"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="lifeStyle.php">LIFE STYLE</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="tushar.php">TUSHAR MISAL</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/balasaheb/misal.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="lifeStyle.php">LIFE STYLE</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="balasaheb.php">BALASAHEB MISAL</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/grape/unnamed.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="lifeStyle.php">LIFE STYLE</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="grape_embassy.php">GRAPE EMBASSY & ZATKA
															MISAL</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
						<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
					</section>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12 two-cols">
				<div class="row">
					<section class="main-gallery">
						<div class="mask">
							<div class="slideset">
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/york/york.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="travel.php">TRAVELLING</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="york.php">YORK WINERY</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/soma/soma1.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="travel.php">TRAVELLING</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="soma.php">SOMA VINE VILLAGE</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/sula/sula3.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="travel.php">TRAVELLING</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="sula.php">SULA VINEYARDS</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/pahine/water.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="travel.php">TRAVELLING</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="pahine.php">PAHINE WATERFALL</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/someshwar/water.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="travel.php">TRAVELLING</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="someshwar.php">SOMESHWAR WATERFALL</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/ashoka/image.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="travel.php">TRAVELLING</a></h2>
												<ul class="add-nav list-inline">
													<li> <a href="ashoka.php">ASHOKA WATERFALL</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<a class="btn-prev" href="#"><i class="fa fa-angle-left"></i></a>
						<a class="btn-next" href="#"><i class="fa fa-angle-right"></i></a>
					</section>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12 two-cols">
				<div class="row">
					<section class="main-gallery">
						<div class="mask">
							<div class="slideset">
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/pharma.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="industry.php">INDUSTRY</a></h2>
												<ul class="add-nav list-inline">
													<li><a href="#">INDUSTRY</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12 two-cols">
				<div class="row">
					<section class="main-gallery">
						<div class="mask">
							<div class="slideset">
								<div class="slide">
									<div class="bg-stretch"><img src="assets/images/upcoming.jpg"
											alt="image description" /></div>
									<div class="post-over">
										<div class="box">
											<div class="block">
												<h2><a href="upcoming.php">UPCOMING PROJECTS</a></h2>
												<ul class="add-nav list-inline">
													<li><a href="#">INDUSTRY</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div> -->


</main>
</div>
</div>
<!-- footer-holder of the page -->
<div class="footer-holder ">
	<aside class="row footer-aside rs-footer">
		<div class="col-sm-4 col-xs-12 column" style="margin:30px 0 ;">
			<ul class="info-nav list-inline" style="margin-top:30px">
				<li><a href="travel.php">Travel</a></li>
				<li><a href="lifeStyle.php">Life Style</a></li>
				<li><a href="industry.php">Industry</a></li>
				<li><a href="religious.php">Religious</a></li>
			</ul>
		</div>
		<div class="col-sm-4 col-xs-12 column social">
			<div class="footer-logo">
				<div class="logo"><a href="#"><img class="img-responsive" src="assets/images/tranquil_logo.png"></a>
				</div>
				<p></p><br><br>
			</div>
		</div>
		<div class="copy" style="margin:55px 0">&copy; 2024 <a href="#" style="color:red">Tranquil Stead</a>. All
			rights reserved.</div>
	</aside>
</div>