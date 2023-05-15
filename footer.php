</div><!-- end of wrapper-->
<?php gents_wrapper_end();
// after wrapper hook
?>
<?php gents_container_end();
// after container hook
?>
  <!-- +++++ Footer Section +++++ -->
<footer id="footer" class="text-light bg-dark">
	<div class="py-2 bg-gold">
		<div class="container">
		  <div class="row">
			<div class="col-lg-4">
			  <?php dynamic_sidebar("footer-left"); ?>
			</div>
			<div class="col-lg-4">
			  <?php dynamic_sidebar("footer-middle"); ?>
			</div>
			<div class="col-lg-4">
			  <?php dynamic_sidebar("footer-right"); ?>
			</div>
		  </div><!-- /row -->
		</div><!-- /container -->
	</div>
<?php wp_footer(); ?>
</body>
<style id="" media="all">
@import url('https://fonts.googleapis.com/css2?family=Dosis&display=swap');
@font-face {
  font-family: adam;
  font-style: normal;
  font-weight: 400;
  src: local("Adam"),
    url(https://fonts.cdnfonts.com/s/16468/Adam.woff) format("woff");
  font-display: swap;
}
</style>
</html>