<!-- contain main informative part of the site -->
<main id="main" role="main">
	<div class="container-fluid">
		<div class="row">
			<?php
			// Check if $cat array exists and is not empty
			if (!empty($cat)) {
				$count = 0;
				foreach ($cat as $c) {
					$getPro = $this->CommonModal->getRowByMoreId('slider_image', ['category_id' => $c['category_id']]);
					$getSub = $this->CommonModal->getRowByMoreId('sub_category', ['category_id' => $c['category_id'], 'is_delete' => '1']);
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
										<?php if (!empty($getSub)) {
											foreach ($getSub as $pro) { ?>
												<div class="slide">
													<div class="bg-stretch">
														<img src="<?= base_url('upload/subcat/') . $pro['image']; ?>"
															alt="<?= $c['category_name']; ?>" />
													</div>
													<div class="post-over">
														<div class="box">
															<div class="block">
																<h2><a
																		href="<?= base_url('listing/') . $c['category_id'] ?>"><?= strtoupper($c['category_name']); ?></a>
																</h2>
																<ul class="add-nav list-inline">
																	<li><a
																			href="<?= base_url('datails/') . $pro['sub_category_id'] ?>"><?= $pro['sub_category_name']; ?></a>
																	</li>
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
</main>