<?php
/**
 * Template file for post archive
 *
 * @package dsignfly
 */

?>

<div class="single-post">
	<div class="blog-post-title">
		<span class="date-month">
			<span class="date"><?php echo get_the_date( 'd' ); ?></span>
			<span class="month"><?php echo get_the_date( 'M' ); ?></span>
		</span>
		<div class="vl"></div>
		<span class="blog-post-title-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
	</div>
	<div class="row">
		<div class="blog-post-content">
			<div class="blog-image">
				<img src="<?php the_post_thumbnail_url(); ?>" alt="image">
			</div>
			<div class="blog-details">
				<span class="blog-post-details">by  <a href="<?php get_the_author_meta( 'url' ); ?>"><?php the_author(); ?></a>  on <?php echo get_the_date(); ?></span>
				<span class="blog-post-details blog-comments"><?php comments_number(); ?></span>
				<hr>
			</div>
			<div class="blog-description"><?php the_excerpt(); ?></div>
			<a href="<?php the_permalink(); ?>">READ MORE</a>
		</div>
	</div>
</div>
