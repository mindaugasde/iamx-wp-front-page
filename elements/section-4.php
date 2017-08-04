<?php

$id = get_field('mp_fps_section-4');
$section_slug = $id[0]->post_name;
$section_ID = $id[0]->ID;

$post_data = get_post($section_ID);
global $post;
$post = $post_data;
setup_postdata($post);

?>

<!-- Skills Section -->
<section id="<?php echo $section_slug; ?>" class="skills-section section-padding">
  <div class="container">
	<h2 class="section-title wow fadeInUp"><?php the_title(); ?></h2>
	
	<?php
	  # Checking featured items quantity
	  
	  if( have_rows('mp_ssp_skills') ):
	  
	  	$num = 0;
	  
	  	while ( have_rows('mp_ssp_skills') ) : the_row();
	  		
	  		$featured_item = get_sub_field('mp_ssp_s_featured');
	  		
	  		if($featured_item == true):
	  			$num++;
	  		endif;
	  
	  	endwhile;
	  
	  endif;
	?>
	
	<?php if( have_rows('mp_ssp_skills') && $num > 0 ): ?>

	<div class="row">
	  <div class="col-md-6">
	  <?php $i = 0; while ( have_rows('mp_ssp_skills') ) : the_row(); ?>
	  
	  	<?php
			$featured_item = get_sub_field('mp_ssp_s_featured');
			if( $featured_item == true ):
		  	$i++;
		?>
	  	
		<div class="skill-progress">
		  <div class="skill-title"><h3><?php the_sub_field('mp_ssp_s_title'); ?></h3></div> 
		  <div class="progress">
			<div class="progress-bar six-sec-ease-in-out" role="progressbar" aria-valuenow="<?php the_sub_field('mp_ssp_s_value'); ?>" aria-valuemin="0" aria-valuemax="100" ><span><?php the_sub_field('mp_ssp_s_value'); ?>%</span>
			</div>
		  </div><!-- /.progress -->
		</div><!-- /.skill-progress -->
		
		<?php
		  $break = round($num / 2);
		  if( $break == $i ):
		?>
		
			</div>

		  <div class="col-md-6">
		
		<?php endif; endif; endwhile; ?>
	  </div>
	</div><!-- /.row -->

	<div class="skill-chart text-center">
	  <h3><?php _e('More skills','vcs-starter'); ?></h3>
	</div>
	
	<?php endif; ?>
	
	<?php if( have_rows('mp_ssp_skills')): ?>

	<div class="row more-skill text-center">
 		<?php
		while ( have_rows('mp_ssp_skills') ) : the_row();
		$featured_item = get_sub_field('mp_ssp_s_featured');
		if( $featured_item == false ):
		?>
 		
	 	<div class="col-xs-12 col-sm-4 col-md-2">
		  <div class="chart" data-percent="<?php the_sub_field('mp_ssp_s_value'); ?>" data-color="e74c3c">
				<span class="percent"></span>
				<div class="chart-text">
				  <span><?php the_sub_field('mp_ssp_s_title'); ?></span>
				</div>
			</div>
		</div>
		<?php endif; endwhile; ?>
	</div>
  
  	<?php endif; ?>

  </div><!-- /.container -->
</section><!-- End Skills Section -->

<?php wp_reset_postdata(); ?>