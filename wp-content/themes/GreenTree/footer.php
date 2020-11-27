			<?php if ( is_active_sidebar( 'last-post-page' )) : ?>
				</div>
			<?php endif; ?>
			
			<footer class="footer">
				<div class="footer-copyright text-center py-3">© Copyright:
					<a href="#"><?php echo Date('Y'); ?> - <?php bloginfo('name'); ?></a>
				</div>

				<?php
        dynamic_sidebar('footer-1');
        ?>
	    </footer>
    
		</div>
		
		<?php
		wp_footer();
		?>

</body>
</html> 