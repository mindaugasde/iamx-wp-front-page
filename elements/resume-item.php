<li<?php if($del == 0): ?> class="timeline-inverted"<?php endif; ?>>
	<div class="posted-date">
		<span class="month"><?php the_field('mp_rp_start_date'); ?>-<?php if($end_date = get_field('mp_rp_end_date')):
			echo $end_date;
		else:
			_e('now','vcs-starter');
		endif;
		?>
		</span>
	</div><!-- /posted-date -->

	<div class="timeline-panel wow fadeInUp">
		<div class="timeline-content">
			<div class="timeline-heading">
				<h3><?php the_title(); ?></h3>
				<?php if($place = get_field('mp_rp_place')): ?>
				<span><?php echo $place; ?></span>
				<?php endif; ?>
			</div><!-- /timeline-heading -->

			<div class="timeline-body">
				<?php the_content(); ?>
			</div><!-- /timeline-body -->
		</div> <!-- /timeline-content -->
	</div> <!-- /timeline-panel -->
</li>