<?php
/**
 * This file is used for the category pages in frontend
 *
 * @package dsignfly
 */

get_header();
get_template_part( 'template-parts/content', 'features' );
?>


<div class="container">
	<div class="row">
		<div class="blog-column">
			<h2 class="blog-heading">Category: <?php single_cat_title( '', false ); ?></h2>
			<hr style="height: 1px; background-color: #62585f;">
			<?php
			$post_query_options = array(
				'post_type' => array( 'post', 'portfolio' ),
				'paged'     => get_query_var( 'paged' ),
			);
			$post_query         = new WP_Query( $post_query_options );
			if ( $post_query->have_posts() ) {
				while ( $post_query->have_posts() ) {
					$post_query->the_post();
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
