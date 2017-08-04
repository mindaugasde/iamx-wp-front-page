<?php

$page = (get_query_var('paged')) ? get_query_var('paged') : 1;

$my_query = new WP_Query(array(
	'post_type' => 'Works',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'DESC',
	'paged' => $page,
));

if ( $my_query->have_posts() ) :

$p_slug = $my_query->query['post_type'];
$p_slug_lower = strtolower($p_slug);

?>

<!-- Works Section -->
<section id="<?php echo $p_slug_lower; ?>" class="works-section section-padding">
  <div class="container">
	<h2 class="section-title wow fadeInUp"><?php echo $p_slug; ?></h2>
	
	<?php
	  
	  # Select all cats from all posts
	
	  $i = 1;
	  $cat_list = array();
	  while ($my_query->have_posts()) : $my_query->the_post();
	  
	  	$categories = get_the_category( $post->ID );
	  	foreach($categories as $cat):
	  
	  		array_push($cat_list, $cat->name);
	  
	  	endforeach;
	  
	  $i++; endwhile;
	  
	  # Select unique cats
	  
	  $cats = array();
	  
	  for($j=0;$j<sizeof($cat_list);$j++):
	  
	  	$checker = true;
	  	
	  	if( sizeof($cats) > 0 ){
			
			for($k=0;$k<sizeof($cats);$k++){
				
				if( $cat_list[$j] == $cats[$k] ){
					
					$checker = false;
					
				}
				
			}
			
			if( $checker == true ){
				
				array_push($cats, $cat_list[$j]);
			}
			
		} else {
			
			array_push($cats, $cat_list[$j]);
			
		}
	  
	  endfor; unset($cat_list);
	  
	?>

	<ul class="list-inline" id="filter">
		<li><a class="active" data-group="all"><?php _e('All','vcs-starter'); ?></a></li>
		<?php foreach($cats as $cat): ?>
		<li><a data-group="<?php echo strtolower($cat); ?>"><?php echo $cat; ?></a></li>
		<?php endforeach; ?>
	</ul>

	<div class="row">
	  <div id="grid">
	  	<?php
		  $i = 1; while ($my_query->have_posts()) : $my_query->the_post();
		  
		  $categories = get_the_category( $post->ID );
		?>
		<div class="portfolio-item col-xs-12 col-sm-4 col-md-3" data-groups='["all"<?php foreach($categories as $cat){ echo ', "' . $cat->slug . '"'; } ?>]'> 
		  <div class="portfolio-bg">
			<div class="portfolio">
			  <div class="tt-overlay"></div>
			  <?php if( $pic = get_the_post_thumbnail_url() ): ?>
			  <div class="links">
				<a class="image-link" href="<?php echo $pic; ?>"><i class="fa fa-search-plus"></i></a>
				<a href="#"><i class="fa fa-link"></i></a>                          
			  </div><!-- /.links -->
			  
			  <img src="<?php echo $pic; ?>" alt="image">
			  <?php endif; ?>
			  <div class="portfolio-info">
				<h3><?php the_title(); ?></h3>
			  </div><!-- /.portfolio-info -->
			</div><!-- /.portfolio -->
		  </div><!-- /.portfolio-bg -->
		</div><!-- /.portfolio-item -->
		<?php $i++; endwhile; ?>
	  </div><!-- /#grid -->
	</div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- End Works Section -->
<?php wp_reset_postdata(); unset($my_query); endif; ?>