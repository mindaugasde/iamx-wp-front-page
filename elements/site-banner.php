<!-- Preloader -->
<div id="tt-preloader">
	<div id="pre-status">
		<div class="preload-placeholder"></div>
	</div>
</div>

<?php $bg = get_the_post_thumbnail_url(); ?>

<!-- Home Section -->
<section id="home" class="tt-fullHeight" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2"<?php if($bg): ?> style="background-image: url(<?php echo $bg; ?>);"<?php endif; ?>>
	<div class="intro">
		<div class="intro-sub"><?php the_title(); ?></div>
		<?php
			$firstH = get_field('mp_hps_subtitle_first');
			$secondH = get_field('mp_hps_subtitle_second');
		
			if( $firstH && $secondH ):
		?>
		<h1><?php echo $firstH; ?> <span><?php echo $secondH; ?></span></h1>
		<?php endif; the_content(); ?>
	  
	  <?php if( have_rows('mp_sl_social_links','option') ): ?>
	  <div class="social-icons">
		<ul class="list-inline">
	  	  <?php while ( have_rows('mp_sl_social_links','option') ) : the_row(); ?>
		  <li><a href="<?php the_sub_field('mp_sl_sl_url','option'); ?>"><i class="fa fa-<?php the_sub_field('mp_sl_sl_icon','option'); ?>"></i></a></li>
		  <?php endwhile; ?>
		</ul>
	  </div> <!-- /.social-icons -->
	  <?php endif; ?>
	</div>

	<div class="mouse-icon">
		<div class="wheel"></div>
	</div>
</section><!-- End Home Section -->