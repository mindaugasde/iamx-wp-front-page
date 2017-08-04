<!-- About Section -->
<section id="<?php echo $section_slug; ?>" class="about-section section-padding">
  <div class="container">
	<?php if($main_heading = get_field('mp_ap_main_heading')): ?>
	<h2 class="section-title wow fadeInUp"><?php echo $main_heading; ?></h2>
	<?php endif; ?>

	<div class="row">

	  <div class="col-md-4 col-md-push-8">
		<div class="biography">
		  <?php if( $photo = get_the_post_thumbnail_url() ): ?>
		  <div class="myphoto">
			<img src="<?php echo $photo; ?>" alt="My Photo">
		  </div>
		  <?php endif; ?>
		  <ul>
			<?php
			$name = get_field_object('mp_ami_name');
			$date = get_field_object('mp_ami_date_of_birth');
			$address = get_field_object('mp_ami_address');
			$nationality = get_field_object('mp_api_nationality');
			$phone = get_field_object('mp_api_phone');
			$email = get_field_object('mp_api_email');
			?>
			<li><strong><?php echo $name['label']; ?>:</strong> <?php echo $name['value']; ?></li>
			<li><strong><?php echo $date['label']; ?>:</strong> <?php echo $date['value']; ?></li>
			<li><strong><?php echo $address['label']; ?>:</strong> <?php echo $address['value']; ?></li>
			<li><strong><?php echo $nationality['label']; ?>:</strong> <?php echo $nationality['value']; ?></li>
			<li><strong><?php echo $phone['label']; ?>:</strong> <?php echo $phone['value']; ?></li>
			<li><strong><?php echo $email['label']; ?>:</strong> <?php echo $email['value']; ?></li>
		  </ul>
		</div>
	  </div> <!-- col-md-4 -->

	  <div class="col-md-8 col-md-pull-4">
		<div class="short-info wow fadeInUp">
		  <?php the_content(); ?>
		</div>

		<div class="short-info wow fadeInUp">
		  <?php the_field('mp_ap_short_info'); ?>
		  <?php if( have_rows('mp_ap_objectives') ): ?>
		  <ul class="list-check">
			<?php while ( have_rows('mp_ap_objectives') ) : the_row(); ?>
			<li><?php the_sub_field('mp_ap_o_objective'); ?></li>
			<?php endwhile; ?>
		  </ul>
		  <?php endif; ?>
		</div>

		<?php if($sign = get_field('mp_ap_signature')): ?>
		<div class="my-signature">
		  <img src="<?php echo $sign['url']; ?>" alt="<?php echo $sign['title']; ?>">
		</div>
		<?php endif; ?>

		<div class="download-button">
		  <a class="btn btn-info btn-lg" href="#<?php the_field('mp_af_contact_link'); ?>"><i class="fa fa-paper-plane"></i><?php the_field('mp_af_contact_message'); ?></a>
		  <?php $file = get_field('mp_af_cv'); ?>
		  <a class="btn btn-primary btn-lg" href="<?php echo $file['url']; ?>" target="_blank"><i class="fa fa-download"></i><?php the_field('mp_af_cv_message'); ?></a>
		</div>
	  </div>



	</div> <!-- /.row -->
  </div> <!-- /.container -->
</section><!-- End About Section -->