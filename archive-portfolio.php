<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dsignfly1
 */

get_header();
get_template_part( 'template-parts/content', 'features' );
?>


<!-- Blog and sidebar section -->

<div class="container">
	<div class="row">

		<!-- blog -->
		<div class="blog-column">
			<h2 class="blog-heading">LET'S BLOG</h2>
			<hr>
		
            <?php get_template_part( 'template-parts/content', 'portfolio' ); ?>

		</div>

		<?php get_template_part('template-parts/content', 'sidebar'); ?>

	</div>
	<hr>
</div>


<!-- pagination -->

<?php get_footer(); ?>
	
