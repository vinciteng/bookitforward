			</div><!-- .container -->
		</div><!-- .site-main #main -->
		
		<?php get_sidebar( 'bottom' ); ?>

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<?php get_template_part( 'menu', 'subsidiary' ) ?>
			</div><!-- .container -->
		</footer><!-- #colophon .site-footer -->
		
	</div><!-- #page .site -->

	<?php get_template_part( 'style', 'switcher' ); ?>
	
<?php wp_footer(); ?>

</body>
</html>