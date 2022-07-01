<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dsignfly1
 */

get_header();
get_template_part('template-parts/content','features');
?>

<?php
	if(have_posts()){
		while(have_posts()){
			the_post();
		}
	}
?>

<div class="container">
	<div class="row">
		<div class="blog-column">
			<h2 class="blog-heading"><?php the_title(); ?></h2>
			<div class="single-blog-details">
				<span class="single-blog-post-details">by <?php the_author(); ?></a> on <?php the_date(); ?></span>
				<span class="single-blog-post-details single-blog-post-comments"><?php comments_number(); ?></span>
			</div>

			<hr style="height: 1px; background-color: #62585f;">
			<span class="single-blog__post-text"><?php the_content(); ?></span>
			<hr style="height: 1px; background-color: #62585f;">

		</div>
			<?php get_template_part('template-parts/content','sidebar'); ?>

	</div>
</div>

<div class="container">
      <hr style="height: 1px; background-color: #62585f; margin-top: 25px;">
    </div>

<?php get_footer(); ?>
