<!-- SINGLE POST -->
<?php 
get_header();
?>

		<div class="main-wrapper">
	    <header class="page-title text-center theme-bg-light py-5">
				<h1 class="heading"><?php the_title(); ?></h1>
		</header>
		<div class="container">
			<article class="content px-3 py-5 p-md-5">			
				<?php if(has_post_thumbnail()) : ?>
					<img src=<?php the_post_thumbnail_url('largest') ?> class="img-fluid mb-5">
				<?php endif; ?>

				<?php
					if(have_posts()) {
						while( have_posts()) {
							the_post();
							get_template_part('template-parts/content','article');
						}
					}
				?>
			</article>
		</div>
			
<?php 
	get_footer();
?>