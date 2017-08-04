<!-- Navigation -->
<header class="header">
	<nav class="navbar navbar-custom" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
					<span class="sr-only"><?php _e('Toggle navigation','vcs-starter'); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				
				
				<a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php the_field('mp_ms_logo','option'); ?>" alt="Logo"></a>
			</div>

			<div class="collapse navbar-collapse" id="custom-collapse">
			
			<?php custom_nav('primary-navigation', 'nav navbar-nav navbar-right'); ?>

			</div>
		</div><!-- .container -->
	</nav>
</header><!-- End Navigation -->