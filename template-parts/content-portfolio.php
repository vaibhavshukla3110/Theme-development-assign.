<?php
/**
 * This page is to render the portfolio posts.
 *
 * @package dsignfly
 */

?>
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
						<a href="<?php the_permalink(); ?>">
							<img class="gallery-image" src="<?php the_post_thumbnail_url(); ?>" alt="portfolio-thumbnail">
						</a>
					</div>
						<?php
					}
				}
			} else {

				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						?>
					<div>
						<a href="<?php the_permalink(); ?>">
							<img class="gallery-image" src="<?php the_post_thumbnail_url(); ?>" alt="portfolio-thumbnail">
						</a>
					</div>
						<?php
					}
				}
			}
			?>
		</div>
