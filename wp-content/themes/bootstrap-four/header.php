<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
    <meta name="description" content="<?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
    <!-- <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo("template_directory"); ?>/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo("template_directory"); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo("template_directory"); ?>/css/plugins/swiper.css">
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo("template_directory"); ?>/css/index.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<!-- Grid -->

	<!-- <div class="content-banner"></div> -->
	<div class="row">
		<div class="container">
			<header id="header">
				<div class="content-logo col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<img src="<?php echo bloginfo("template_directory"); ?>/img/logo.png" alt="Gomes & Ferreira - Constutora" title="Gomes & Ferreira - Constutora" />
				</div>

				<nav class="navbar navbar-default col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Institucional</a></li>
						<li><a href="#">Empreendimento</a></li>
						<li><a href="#">Portfólio</a></li>
						<li><a href="#">Contato</a></li>
					</ul>
				</nav>
			</header>
