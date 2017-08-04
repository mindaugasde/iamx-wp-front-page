<?php

/* Template Name: About page */

get_header();

// The number of all posts for a given query
$posts_found = $GLOBALS['wp_query']->found_posts;
// The number of posts for just the page
$posts_count = $GLOBALS['wp_query']->post_count;

get_template_part('elements/site-header');

if(have_posts()): ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php get_template_part('elements/about-section'); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>