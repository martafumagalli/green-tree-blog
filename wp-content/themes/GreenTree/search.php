<?php 
get_header();
?>

		<div class="main-wrapper">
	    <header class="page-title text-center my-theme py-5">
				<h1 class="heading"><?php the_title(); ?></h1>
				<h5 class="subtitle">Reflections and ideas for an eco-conscious way of living</h5>
		</header>
    
		<article class="content px-3 py-5 p-md-5">
			
			<?php

				if( have_posts()) {

					while( have_posts()) {

						the_post();
						get_template_part('template-parts/content','archive');

					}

				}

			?>

	  </article>
			
<?php 
	get_footer();
?>