<?php
	$comments = get_comments(array(
		'post_id'=>$post->ID,
		'status'=>'approve',
		'order'=>'ASC'
	));
	?>
	<ul id="utune-nested-comment">
	<?php
	$com = wp_list_comments(array(
		'type'=>'comment',
		'callback'=>'utune_comment_template'
	), $comments);
	?>
	</ul>
	<?php
	comment_form(array(
		'comment_field'=>'<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'utune' ) . '</label><textarea id="comment" class="col-md-8 col-xs-12" name="comment" cols="45" rows="8" aria-required="true"></textarea><div class="clearfix"></div></p>'
	)); 
?>