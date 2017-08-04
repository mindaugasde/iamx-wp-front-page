<?php

$id = get_field('mp_fps_section-1');
$section_slug = $id[0]->post_name;
$section_ID = $id[0]->ID;

$post_data = get_post($section_ID);
global $post;
$post = $post_data;
setup_postdata($post);

?>

<?php include(locate_template('elements/about-section.php')); ?>

<?php wp_reset_postdata(); ?>