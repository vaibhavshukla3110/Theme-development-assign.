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
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content', 'archive' );
			}
		}
		?>
		</div>

		<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>

	</div>
	<hr>
</div>

<div class="container">
<div class="blog__pagination">
<?php
	echo wp_kses_post(
		paginate_links(
			array(
				'before_page_number' => '<span class="blog__pagination-item">',
				'after_page_number'  => '</span>',
				'prev_text'          => '«',
				'next_text'          => '»',
			)
		)
	);
	?>
</div>
</div>

<?php get_footer(); ?>
