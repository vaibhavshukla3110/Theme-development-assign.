<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package dsignfly1
 */

get_header();
get_template_part( 'template-parts/content', 'features' )
?>

	<div class="container">
		<div class="row">
			<div class="blog-column">
				<h2 class="blog-heading">Results for:
				<?php
				if ( isset( $_GET['s'] ) ) {
					// phpcs:ignore
					echo wp_kses( wp_unslash( sanitize_title( $_GET['s'] ) ), '' );}
				?>
				</h2>
				<hr style="height: 1px; background-color: #62585f;">
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
</div>

<!-- Pagination -->
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

<div class="container">
<hr style="height: 1px; background-color: #62585f; ">
</div>

<?php get_footer(); ?>
