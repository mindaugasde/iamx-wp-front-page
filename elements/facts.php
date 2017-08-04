<?php
if( have_rows('mp_fs_fact','option') ):
$image = get_field('mp_fb_image','option');
$color = get_field('mp_fb_color','option');
?>
<!-- Facts Section -->
<section id="facts" class="facts-section text-center" data-stellar-vertical-offset="50" data-stellar-background-ratio="0.2"<?php if($image || $color): ?> style="<?php if($image): ?>background-image: url(<?php echo $image; ?>);<?php elseif($color): ?>background-color: <?php echo $color; ?>;<?php endif; ?>"<?php endif; ?>>
  <div class="tt-overlay-bg">
	<div class="container">
	  <div class="row">
		<div class="col-md-12">
		  <div class="count-wrap">
		  	<?php while ( have_rows('mp_fs_fact','option') ) : the_row(); ?>
			<div class="col-sm-3 col-xs-6">
			  <i class="fa fa-<?php the_sub_field('mp_fs_f_icon'); ?>"></i>
			  <h3 class="timer"><?php the_sub_field('mp_fs_f_value'); ?></h3>
			  <p><?php the_sub_field('mp_fs_f_title'); ?></p>
			</div>
			<?php endwhile; ?>
		  </div><!-- /count-wrap -->
		</div><!-- /.col-md-12 -->
	  </div><!-- /.row -->
	</div><!-- /.container -->
  </div>
</section> <!-- End Facts Section -->
<?php endif; ?>