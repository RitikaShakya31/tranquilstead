<!-- include jQuery library -->
<script type="text/javascript" src="assets/js/jquery-1.11.2.min.js"></script>
<!-- include Bootstrap's JavaScript -->
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<!-- include custom JavaScript -->
<script type="text/javascript" src="assets/js/jquery.main.js"></script>
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