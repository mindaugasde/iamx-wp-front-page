<?php

$id = get_field('mp_fps_section-3');
$section_slug = $id[0]->post_name;
$section_ID = $id[0]->ID;

$post_data = get_post($section_ID);
global $post;
$post = $post_data;
setup_postdata($post);

?>
<!-- Resume Section -->
<section id="<?php echo $section_slug; ?>" class="resume-section section-padding">
	<div class="container">
		<h2 class="section-title wow fadeInUp"><?php the_title(); ?></h2>
		<?php
		wp_reset_postdata();

		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$my_query = new WP_Query(array(
			'post_type' => 'Education',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'paged' => $page,
		));

		if ( $my_query->have_posts() ) :

		?>
	
		<div class="row">
			<div class="col-md-12">
				<div class="resume-title">
					<h3><?php echo $my_query->query['post_type']; ?></h3>
				</div>
				<div class="resume">
					<ul class="timeline">
						<?php $i = 1; while ($my_query->have_posts()) : $my_query->the_post();
						
						$del = $i % 2;
						
						include(locate_template('elements/resume-item.php'));
						
						$i++; endwhile; ?>
					</ul>
				</div>
			</div>
		</div><!-- /row -->
		
		<?php wp_reset_postdata(); unset($my_query); endif; ?>
		
		<?php
		
		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$my_query = new WP_Query(array(
			'post_type' => 'Experience',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'DESC',
			'paged' => $page,
		));

		if ( $my_query->have_posts() ) :

		?>

		<div class="row">
			<div class="col-md-12">
				<div class="resume-title">
					<h3><?php echo $my_query->query['post_type']; ?></h3>
				</div>
				<div class="resume">
					<ul class="timeline">
						<?php $i = 1; while ($my_query->have_posts()) : $my_query->the_post();
						
						$del = ($i % 2) - 1;
						
						include(locate_template('elements/resume-item.php'));
						
						$i++; endwhile; ?>
					</ul>
				</div>
			</div>
		</div><!-- /row -->
		<?php wp_reset_postdata(); unset($my_query); endif; ?>
	</div><!-- /.container -->
</section><!-- End Resume Section -->