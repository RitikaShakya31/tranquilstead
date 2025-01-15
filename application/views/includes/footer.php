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
				<div class="logo"><a href="#"><img class="img-responsive" src="<?= base_url()?>assets/images/tranquil_logo.png"></a>
				</div>
				<p></p><br><br>
			</div>
		</div>
		<div class="copy" style="margin:55px 0">&copy; 2024 <a href="#" style="color:red">Tranquil Stead</a>. All
			rights reserved.</div>
	</aside>
</div>
<!-- include jQuery library -->
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery-1.11.2.min.js"></script>
<!-- include Bootstrap's JavaScript -->
<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
<!-- include custom JavaScript -->
<script type="text/javascript" src="<?= base_url()?>assets/js/jquery.main.js"></script>
<script type="text/javascript">
	if (navigator.userAgent.match(/IEMobile\/10\.0/) || navigator.userAgent.match(/MSIE 10.*Touch/)) {
		var msViewportStyle = document.createElement('style')
		msViewportStyle.appendChild(
			document.createTextNode(
				'@-ms-viewport{width:auto !important}'
			)
		)
		document.querySelector('head').appendChild(msViewportStyle)
	}
</script>
<script type="text/javascript">
	jQuery('#nav [data-toggle="dropdown"][href!="#"]').on('click', function () {
		if (jQuery(this.parentNode).hasClass('open')) {
			location.href = this.href;
		}
	});
</script>
<script type="text/javascript">
	jQuery('[data-toggle="dropdown"]').each(function () {
		var item = jQuery(this),
			parent = item.parent();

		parent.one('mousemove', function () {
			parent.hover(function () {
				parent.addClass('open');
			}, function () {
				parent.removeClass('open');
			}).trigger('mouseover');
		});
	});
</script>
</body>
</html>