<!-- Comment Section -->
<p class="single-blog-comment-heading">Comments</p>
<hr style="height: 1px; background-color: #62585f;">

	<?php
	/**
	 * This file is for the comment section.
	 *
	 * @package category
	 */

	if ( ! have_comments() ) {
		echo '<span style="color:#ef4634;">No Post Found. Leave a comment</span>';
	} else {
		?>
		<?php
	}
	?>
<div>

<?php

wp_list_comments(
	array(
		'avatar_size' => 50,
		'style'       => 'div',
	)
);

?>

</div>

<div>
<?php
if ( comments_open() ) {
	$fields = array(
		'author' => '<div class="single-blog-comment-form-group"><label class="single-blog-form-label" for="single-blog-comment_username">Name</label><br><input style="width:95%" type="text" id="author" name="author" class="single-blog-form-item" required></div>',
		'email'  => '<div class="single-blog-comment-form-group"><label class="single-blog-form-label" for="single-blog-comment_username">Email</label><br><input style="width:95%" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="email" name="email" class="single-blog-form-item" required></div>',
		'url'    => '<div class="single-blog-comment-form-group"><label class="single-blog-form-label" for="single-blog-comment_username">Website</label><br><input style="width:100%" type="url" pattern="https?://.+" id="url" name="url" class="single-blog-form-item"></div>',
	);
	$args   = array(
		'fields'        => $fields,
		'comment_field' => '<textarea class="single-blog-form-item" style="height:90px" id="comment" name="comment" required></textarea>',
		'submit_field'  => '<input name="submit" type="submit" id="submit" class="single-blog-comment-form-submit" value="Submit">',
	);
	comment_form( $args );
	?>

	<?php
}
?>
</div>
<!-- Post Comment -->
