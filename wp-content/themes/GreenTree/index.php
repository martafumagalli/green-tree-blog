<?php 
get_header();
?>

		<div class="main-wrapper">
	    <header class="page-title text-center theme-bg-light py-5">
				<h1 class="heading"><?php echo get_custom_nav_description('Main Menu', '14'); ?></h1>
		</header>
    
		<article class="content px-3 py-5 p-md-5">
			
			<?php

				if( have_posts()) {
					while( have_posts()) {

						the_post();
						get_template_part('template-parts/content','archive');

					}
        }        

        the_posts_pagination([
                'prev_text' => 'Previous', 'previous set of posts',
                'next_text' => 'Next', 'next set of posts',
                'class' => 'pagination',
        ]);

      ?>

	  </article>
			
<?php 
	get_footer();
?>