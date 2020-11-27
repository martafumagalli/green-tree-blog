<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
    <!-- <title>GreenTree Blog</title> -->
    <!-- Meta -->
    <meta charset=<?php bloginfo('charset'); ?>>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=<?php bloginfo('description'); ?>>
    <link rel="shortcut icon" href="http://localhost/greentree/wp-content/uploads/2020/09/logo.png">
		
	<?php
		wp_head();
	?>

</head> 

<body>
    
    <header class="header text-center">
        
	    <nav class="navbar navbar-expand-lg navbar-dark" >
           
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>

			<div id="navigation" class="collapse navbar-collapse flex-column">
        <?php
        
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id);
        ?>
        
				<img class="mb-0 mt-3 mx-auto logo" src=<?php echo $logo[0] ?> alt="logo" >			
				<a class="site-title pt-lg-4 mb-0 site-title-link" href=<?php echo get_home_url()?>><h3>
          <?php echo get_bloginfo('name'); ?>
        </h3></a>

        <?php

          wp_nav_menu(
            [
              'menu' => 'primary',
              'container' => '',
              'theme_location' => 'primary',
              'items_wrap' => '<ul id="" class="navbar-nav flex-column mt-5 mb-5 text-sm-center text-md-left">%3$s</ul>',
              'walker' => new WP_Bootstrap_Navwalker(),
            ]
          )

        ?>

				<hr>
        
        <?php
        dynamic_sidebar('sidebar-1');
        ?>

      </div>
      
      

			</div>
		</nav>
    </header>

