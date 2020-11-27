<?php 
get_header();

$custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id);
?>

		<div class="main-wrapper">
	    <header class="page-title text-center my-theme py-5">
				<img class="mb-3 mx-auto logo site-logo" src=<?php echo $logo[0] ?> alt="logo" >
				<h1 class="heading"><?php echo get_bloginfo('name'); ?></h1>
				<h5 class="subtitle"><?php echo get_bloginfo('description'); ?></h5>
		</header>

		<article class="content px-3 py-5 p-md-5">
			<div class='container'>		

			<?php
				// enable to add homepage slider
				// echo do_shortcode('[metaslider id="148"]');
				if( have_posts()) {
					while( have_posts()) {
						the_post();
						the_content();
					}
				}
			?>

			<?php
				dynamic_sidebar('front-page-left');
				dynamic_sidebar('front-page-right');
				dynamic_sidebar('front-page-bottom');
			?>

			</div>
		</article>
			
<?php 
	get_footer();
?>