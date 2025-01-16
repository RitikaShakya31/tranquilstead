<body>
	<!-- main container of all the page elements -->
	<div id="wrapper">
		<!-- w1 of the page -->
		<div class="w1">
			<!-- header of the page -->
			<header id="header" class="container-fluid" position="fixed">
				<div class="row">
					<div class="col-xs-12">
						<!-- logo of the page -->
						<div class="logo"><a href="<?= base_url() ?>"><img class="img-responsive"
									src="<?= base_url() ?>assets/images/Tranquilstead_Logo.png"></a></div>
						<!-- nav of the page -->
						<div id="nav">
							<a href="#" class="nav-opener">
								<span></span>
								<span></span>
								<span></span>
							</a>
							<div class="nav-holder">
								<a href="" class="btn-close"><i class="fa fa-times"></i></a>
								<form action="#" class="search-form">
									<input type="search" class="form-control" placeholder="Search...">
									<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
								</form>
								<ul class="list-inline">
									<?php if ($cat) {
										foreach ($cat as $c) { ?>
											<li><a href="<?= base_url('listing/') . $c['category_id']?>"><?= $c['category_name']?></a></li>
											<?php
										}
									} ?>
								</ul>
								<ul class="social-networks1 list-inline" style="font-size:30px">
									<li><a
											href="https://www.instagram.com/tranquilstead.in/profilecard/?igsh=MWQycWd1MmI0eTNqMg=="><i
												class="fa-brands fa-square-instagram"></i></a></li>
								</ul>
								<span class="copyrights">&copy; 2025 <a href="#">Tranquilstead</a>. All rights
									reserved.</span>
							</div>
						</div>
					</div>
				</div>
			</header>