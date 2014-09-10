<?php
if(have_posts()){
	while(have_posts()){
		the_post();
		$date = utune_split_date(get_the_date('M d Y'));
		?>
		<div class="row utune-posts">
			<div class="col-md-1 col-xs-1 utune-blog-date">
				<div class="month"><?php echo $date[0] ?></div>
				<div class="date"><?php echo $date[1] ?></div>
				<div class="year"><?php echo $date[2] ?></div>
			</div>
			<div class="col-md-11 col-xs-11 utune-post-inner">
				<?php if(has_post_thumbnail()): ?>
					<div class="utune-thumb">
						<a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
					</div>
				<?php endif; ?>
				<h2 class="utune-blog-heading">
					<a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
				<!-- <div class="utune-post-info">
					posted by <?php //the_author(); ?> in <?php //the_category(', '); ?>
				</div> -->
				<?php the_excerpt(); ?>
				<div class="utune-tags">
					<?php the_tags('<i class="fa fa-tags"></i> ', ', '); ?>
					<span class="utune-pade"></span><i class="fa fa-comments"></i> <?php echo comments_number('0 comments'); ?>
					<span class="utune-pade"></span><i class="fa fa-folder-open"></i> <?php the_category(', '); ?>
				</div>
			</div>
		</div>
		<?php
	}
}