<?php

$id = get_field('mp_fps_section-contact');
$section_slug = $id[0]->post_name;
$section_ID = $id[0]->ID;

$post_data = get_post($section_ID);
global $post;
$post = $post_data;
setup_postdata($post);

?>

<!-- Contact Section -->
<section id="<?php echo $section_slug; ?>" class="contact-section section-padding">
  <div class="container">
	<h2 class="section-title wow fadeInUp"><?php get_field('mp_cp_title') ? the_field('mp_cp_title') : the_title(); ?></h2>

	<div class="row">
	  <div class="col-md-6">
		<div class="contact-form">
		  <?php if($fh = get_field('mp_cp_form_heading')): ?><strong><?php echo $fh; ?></strong><?php endif; ?>
		  
		  <?php
			$form = get_field('mp_cp_form');
			$form_ID = $form->ID;
			$form_title = $form->post_title;
		  ?>
		  
		  <?php echo do_shortcode("[contact-form-7 id='$form_ID' title='$form_title' html_id='contactForm']"); ?>
		  
		</div><!-- /.contact-form -->
	  </div><!-- /.col-md-6 -->

	  <div class="col-md-6">
		<div class="row center-xs">
		  <div class="col-sm-6">
			<i class="fa fa-map-marker"></i>
			<address>
			  <strong><?php _e('Address/Street','vcs-starter'); ?></strong>
			  <?php the_field('mp_ms_street','option'); ?><br>
			  <?php the_field('mp_ms_location','option'); ?><br>
			</address>
		  </div>

		  <div class="col-sm-6">
			<i class="fa fa-mobile"></i>
			<div class="contact-number">
			  <strong><?php _e('Phone Numbers','vcs-starter'); ?></strong>
			  <?php
				$mobile = get_field('mp_ms_mobile_number','option');
				$fax = get_field('mp_ms_fax_number','option');
			  ?>
			  <a href="tel:+<?php echo str_replace(array('(',')',' '),'',$mobile); ?>"><?php echo $mobile; ?></a><br>
			  <a href="tel:+<?php echo str_replace(array('(',')',' '),'',$fax); ?>"><?php echo $fax; ?></a>
			</div>
		  </div>
		</div>

	  <div class="row">
		<div class="col-sm-12">
		  <div class="location-map">
			<div id="mapCanvas" class="map-canvas"></div>
		  </div>
		</div>
	  </div>

	  </div>
	</div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- End Contact Section -->
<?php wp_reset_postdata(); ?>