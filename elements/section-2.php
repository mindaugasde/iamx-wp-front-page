<?php
$video = get_field('mp_fps_section-2-video');
if($video):
?>

<!-- Video Section -->
<section id="video" class="video-section">
  <div class="tf-bg-overlay">

	<div class="container">

	  <div class="video-intro">
		 <a class="popup-video" href="<?php echo $video; ?>"> <i class="fa fa-play"></i>  </a>
		 <?php if($title = get_field('mp_fps_section-2-title')): ?>
		 <h2><?php echo $title; ?></h2>
		 <?php endif; ?>
	  </div>

	</div>

	<!--/.container-->
  </div>
  <!--/.overlay-->
</section>
<!-- /.Video Section -->
<?php endif; ?>