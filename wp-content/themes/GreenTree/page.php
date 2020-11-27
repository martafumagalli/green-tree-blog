<?php 
get_header();
?>
		<div class="main-wrapper">
	    <header class="page-title text-center theme-bg-light py-5">
				<h1 class="heading"><?php the_title(); ?></h1>
			</header>

			<?php if ( is_active_sidebar( 'last-post-page' )) : ?>
				<div class="container">
				<?php dynamic_sidebar('last-post-page'); ?>
			<?php endif; ?>

			<?php dynamic_sidebar('page-1'); ?>
			<article class="content px-3 py-5 p-md-5">		
				<?php
					if( have_posts()) {
						while( have_posts()) {
							the_post();
							get_template_part('template-parts/content','page');
						}
					}
				?>
		  </article>
			<?php dynamic_sidebar('page-2'); ?>
<?php 
	get_footer();
?>