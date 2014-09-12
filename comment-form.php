<?php 
	$comments = get_comments(array(
		'status'=>'approve',
		'order'=>'ASC'
	));

	foreach($comments as $comment){
		echo '<div class="comment-item">'.$comment->comment_content.'</div>';
	}
	print_r($comments);
	comment_form(array(
		'comment_field'=>'<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'utune' ) . '</label><textarea id="comment" class="col-md-8 col-xs-12" name="comment" cols="45" rows="8" aria-required="true"></textarea><div class="clearfix"></div></p>'
	)); 
?>