<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->

<head id="header">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="theme-color" content="#000000">
    <meta name="msapplication-navbutton-color" content="#000000">
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000">
    <title>
		<?php if(is_front_page() ) : ?>
			<?php echo get_bloginfo()?>
		<?php else : ?>
			<?php echo get_bloginfo()?> | <?php wp_title(''); ?>
		<?php endif; ?>
    </title>
    <!--<link rel="shortcut icon" href="<?php /*echo get_stylesheet_directory_uri(); */?>/assets/images/favicon.ico" />-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/assets/images/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">

	<?php wp_head();?>




</head>

<body <?php body_class(' eupopup eupopup-top');?> >

<header>
    <!-- Static navbar -->

    <nav class="navbar  " >
        <div class="container-fluid">
            <div class="navbar-header">


                <a class="img-logo" href="<?php echo site_url() ?>">
                    <img src="<?php echo get_template_directory_uri() ; ?>/assets/images/logo.svg" alt="" width="200" >
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse wp-navbar">


				<?php
				/*wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 4,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav yamm pull-right',
						'fallback_cb'       => 'Yamm_Nav_Walker_menu_fallback',
						'walker'            => new Yamm_Nav_Walker())
				);*/

				?>
                <a data-fancybox="images" data-src="#content-1" href="#" >
                    <img class="pull-right" src="<?php echo get_template_directory_uri() ; ?>/assets/images/user-circle-light.svg" alt="" width="50">
                </a>

            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>




</header>
<div class="clearfix"></div>


<section class="wrapper animsitionxa-fade" id="page"> <!-- website wrapper -->
