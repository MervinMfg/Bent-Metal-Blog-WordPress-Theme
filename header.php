<?php
	// Default social share image
	$GLOBALS['pageImage'] = get_bloginfo('template_directory') . "/_/img/social-share.jpg";
	// GET THE PAGE DESCRIPTION, AND IMAGE IF IT'S SINGLE
	if (is_single()){
		if (have_posts()){
			while (have_posts()){
				the_post();
				// set page thumbnail now that we know we have a single post, used for FB likes
				$GLOBALS['pageImage'] = get_post_image('medium');
				$GLOBALS['pageImage'] = $GLOBALS['pageImage'][0];
			}
		}
	} else {
		if($post) {
			if(has_post_thumbnail($post->ID) && !is_home()){
				$GLOBALS['pageImage'] = get_post_image('medium');
				$GLOBALS['pageImage'] = $GLOBALS['pageImage'][0];
			}
		}
	}
	// Default page title
	$GLOBALS['pageTitle'] = "Bent Metal Blog";
	// Default page description
	$pageDescription = "We took our knowledge of high-end materials used control the flex and performance of snowboards and applied it to snowboard bindings.";
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head id="www-bentmetal-com" data-template-set="bentmetal-blog-wordpress-theme">
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php echo $GLOBALS['pageTitle']; ?></title>
	<meta name="description" content="<?php echo $pageDescription; ?>" />
	<meta name="author" content="Bent Metal Binding Works" />
	<meta name="Copyright" content="Copyright Bent Metal Binding Works <?php echo date('Y'); ?>. All Rights Reserved." />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="google-site-verification" content="xxx" />
<?php if (is_search()) echo "\t" . '<meta name="robots" content="noindex, nofollow" />' . "\n"; ?>
	<meta property="og:title" content="<?php echo $GLOBALS['pageTitle']; ?>" />
	<meta property="og:description" content="<?php echo $pageDescription; ?>" />
	<meta property="og:url" content="<?php the_permalink(); ?>" />
	<meta property="og:image" content="<?php echo $GLOBALS['pageImage']; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="Bent Metal Binding Works" />
	<meta property="fb:app_id" content="xxx"/>
	<meta itemprop="name" content="<?php echo $GLOBALS['pageTitle']; ?>" />
	<meta itemprop="description" content="<?php echo $pageDescription; ?>" />
	<meta itemprop="image" content="<?php echo $GLOBALS['pageImage']; ?>" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@bent_metal" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/_/img/favicon.ico" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/_/img/apple-touch-icon-precomposed.png" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<!-- header includes -->
	<?php include get_template_directory() . '/_/inc/header-includes.php'; ?>
	<!-- end header includes -->
	<!-- WordPress Head -->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<!-- Begin Wrapper -->
	<div id="wrapper">
		<header>
			<div class="header-wrapper">
				<div class="logos-wrapper" itemscope itemtype="https://schema.org/Organization">
					<a href="https://prod.bentmetal.com" id="logo" class="site-title" rel="home" itemprop="url">
						<img src="<?php echo get_template_directory_uri(); ?>/_/img/bent-metal-logo2.png" alt="Bent Metal Binding Works logo" />
					</a>
				</div><!-- .logos-wrapper -->
				<a class="screen-reader-text skip-link" href="#content">Skip to content</a>

				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_class' => 'nav-menu'
						)
					);
				?>

				<div class="search-toggle-wrapper">
					<a href="#search" class="search-toggle"></a>
				</div>
				<div class="search ">
					<?php get_search_form(); ?>
				</div>
			</div><!-- .header-wrapper -->
		</header><!-- .site-header -->
