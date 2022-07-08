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
			<h2 class="blog-heading">DESIGN IS THE SOUL</h2>
<hr>
<div class="photo-gallery">
			<?php

			if ( is_front_page() ) {

				$portfolio_query_options = array(
					'post_type'      => 'portfolio',
					'post_status'    => 'publish',
					'posts_per_page' => 6,
				);

				$portfolio_query = new WP_Query( $portfolio_query_options );
				if ( $portfolio_query->have_posts() ) {
					while ( $portfolio_query->have_posts() ) {
						$portfolio_query->the_post();
						?>
					<div>
						<a href="">
							<img class="gallery-image" src="<?php the_post_thumbnail_url(); ?>" alt="portfolio-thumbnail">
						</a>
					</div>

						<?php
					}
				}
			} else {

				$inc = 1;
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						?>
					<div>
							<img class="gallery-image" onclick="showImage(<?php echo $inc; ?>, '<?php the_post_thumbnail_url(); ?>')"id="image-<?php echo esc_attr( $inc ); ?>" src="<?php the_post_thumbnail_url(); ?>" alt="portfolio-thumbnail">
					</div>
					<div id="myModal" class="modal">

						<!-- Modal content -->
						<div class="modal-content">
							<span class="close">&times;</span>
							<img src="" alt="" id="imgModal">
							<span class="arrows" onclick="prevoiusPic">&larr;</span>
							<span class="arrows" onclick="nextpic">&rarr;</span>
							<p id="modal-para">Lorem ipsum, dolor sit.</p>
						</div>

					</div>
						<?php
						$inc++;
					}
				}
			}
			?>
		</div>


		</div>

		<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>

	</div>
	<hr>
</div>

<script>

	var modal = document.getElementById("myModal");
	const showImage = (id, url) => {
		const galleryImage = document.getElementById(`image-${id}`);
		document.getElementById("imgModal").setAttribute("src", url);
		modal.style.display = "block";
	}
	var span = document.getElementsByClassName("close")[0];
	span.onclick = function() {
		modal.style.display = "none";
	}

	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}

	
</script>

<div class="container">
<div class="blog__pagination">
<?php
	echo wp_kses_post( paginate_links(
			array(
				'before_page_number' => '<span class="blog__pagination-item">',
				'after_page_number'  => '</span>',
				'prev_text'          => '«',
				'next_text'          => '»',
			)
		) );
	?>
</div>
</div>

<?php get_footer(); ?>
