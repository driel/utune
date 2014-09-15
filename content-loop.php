<div id="utune-post-content">
	<?php
	if(have_posts()){
		while(have_posts()){
			the_post();
			the_content();
		}
	}
	?>
	<div class="utune-strip"></div>
</div>