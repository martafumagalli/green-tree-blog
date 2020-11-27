<div class="comments-wrapper">

		<div class="comments" id="comments">

			<div class="comments-header">
				<h3>Comments</h3>
				<h4 class="comment-reply-title">
					<?php 
						if (!have_comments()) {
							echo 'Leave here your comment';
						} else {
							echo 'There are ' .get_comments_number(). ' comments at your post';
						}
					?>
				</h4>

			</div>

			<div class="comments-inner">

				<?php
					wp_list_comments([
						'avatar_size' => 90,
						'style' => 'div'
					]);
				?>

			</div>

		</div>

		<hr class="" aria-hidden="true">
		
		<?php
			if( comments_open()) {
				comment_form(
					[
						'class_form'=>'',
						'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_replay_after' => '</h2>',
            'label_submit'=>'Post a comment'
					]
					);
			};					
		?>

	</div>