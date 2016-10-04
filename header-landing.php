<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-xs-4 col-sm-3 logo-zone-wrapper">
					<a href="/" class="logo"><img alt="Worldwide Clinical Trials - Scientifically Minded - Medically Driven" src="/WorldwideClinicalTrials/media/common/wct-logo.svg" title="Worldwide Clinical Trials - Scientifically Minded - Medically Driven" /></a>
				</div>
				<div class="col-xs-8 col-sm-9 nav-zones-wrapper">
					<div class="top-nav-zone">

					</div>
					<div class="primary-nav-zone">
						<div class="nav-extras"><a href="tel:610-964-2033" class="btn btn-hollow btn-blue btn-sm landing-contact">
								<span class="fa fa-phone">&nbsp;</span>610-964-2033
							</a></div>
					</div>
				</div>
			</div>
		</div>

	</header>
	
	<div class="main-content">