<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Misty Lake
 * @since Misty Lake 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'mistylake_credits' ); ?>
Тема от <a href="http://automattic.com" rel="designer">Automattic</a>, локализатор <a href="http://wp-templates.ru/">WordPress темы</a>, поддержка <a href="http://searchtimes.ru/">форум</a>.
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>