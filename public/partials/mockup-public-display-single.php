<!DOCTYPE html>

<html>

	<head>

		<meta name="robots" content="noindex, nofollow" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />

		<title><?php echo $single->mockup_page_title(); ?></title>

		<link rel='stylesheet' id='dashicons-css'  href='<?php echo includes_url('css'); ?>/dashicons.min.css?ver=<?php bloginfo('version'); ?>' type='text/css' media='screen' />
		<link href="<?php echo plugins_url('mockup'); ?>/public/css/single.min.css?ver=<?php echo $this->version; ?>" rel="stylesheet" />
		<style type="text/css">

			<?php // Get import font.
			echo get_option( 'mockup_importfont', '' ); ?>

			body {
				background-image: url('<?php echo $single->url_background; ?>'); 
				background-repeat: <?php echo $single->position_background; ?>;
			}

			div.sidebar {
				width: <?php echo $single->sidebarsize; ?>px;
				margin-left: -<?php echo $single->sidebarsize; ?>px;
			}

			.tooltip,
			h1, p, a, li {
				font-family: <?php echo $single->fontfamily; ?>;
			}

			a.active span.dashicons,
			a.toggle:hover span.dashicons,
			div.sidebar ul li a {
				color: <?php echo $single->activecolor; ?> !important;
			}

			.btn,
			input,
			textarea {
				font-family: <?php echo $single->fontfamily; ?>;
			}

			<?php // Get custom style.
			echo get_option( 'mockup_style_general', '' ); ?>

		</style>

		<script type='text/javascript' src='<?php echo includes_url('js/jquery'); ?>/jquery.js?ver=<?php echo $this->version; ?>'></script>
		<script type="text/javascript">
			post_id = "<?php echo $single->postID; ?>";
			images_url = "<?php echo admin_url('images'); ?>";
			ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
			silidebox_size = "<?php echo $single->sidebarsize; ?>";
			overlay = "<?php echo $single->overlay; ?>";
			overflowx = "<?php echo $single->overflowx; ?>";
			animationTime = <?php echo $single->animation_time; ?>;
		</script>
		<script src="<?php echo plugins_url('mockup'); ?>/public/js/single.min.js"></script>

		<?php // Show favicons
		if(function_exists('wp_site_icon')) {
			wp_site_icon();
		} ?>

	</head>

	<?php if($single->mockup_check_password()) {
		// Password protected area.

		echo '<body>';

			echo '<div class="overlay-password">';

				echo $single->mockup_password_form();

			echo '</div>';

		echo '</body>';

	} else { // Show mockup. ?>

		<body <?php body_class(); ?> style="background-color: <?php echo $single->bgcolor; ?>;">


			<?php // Check if intro needs to be shown.
			if($single->intro == 'show' && $single->intro_cookie != 'hide') { ?>

				<div class="overlay-intro">

					<div class="overlay-intro-content">

						<span class="dashicons dashicons-undo"></span>

						<h1><?php echo $single->intro_title; ?></h1>

						<?php if( get_option( 'mockup_intro_text' ) ) {

							echo '<p>'.nl2br( get_option( 'mockup_intro_text', '' ) ).'</p>';

						} ?>

						<a href="#" class="close-intro"><?php echo $single->intro_link; ?></a>

					</div>

				</div>

			<?php } ?>


			<?php if($single->overlay === 'show') echo '<div class="overlay"></div>'; ?>


			<div class="mockup" style="height: <?php echo $single->height.'px'; ?>; min-width: <?php echo $single->width.'px'; ?>; background-image: url('<?php echo $single->url; ?>'); background-position:<?php echo $single->position; ?>;"></div>


			<div class="navbar">

				<?php // Construct the menu
				// Add do action before the custom menu
				do_action('mockup_before_single_menu');

				// Show custom menu
				echo $single->mockup_single_menu();

				// Add do action after the custom menu
				do_action('mockup_after_single_menu'); ?>

			</div>

			<div class="sidebar">

				<a href="#" id="close"><span class="dashicons dashicons-dismiss"></span></a>

				<div id="load_content_here" class="content"></div>

				<div class="scroll">

					<a href="#" class="scroll-up"><span class="dashicons dashicons-arrow-up-alt2"></span></a>
					<a href="#" class="scroll-down"><span class="dashicons dashicons-arrow-down-alt2"></span></a>

				</div>

			</div>

		</body>
		
	<?php } ?>

</html>