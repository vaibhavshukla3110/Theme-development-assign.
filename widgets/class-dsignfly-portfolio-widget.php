<?php
/**
 * For displayin the portfolio posts widget on sidebar
 *
 * @package dsigfly
 */

/**
 * Adds Foo_Widget widget.
 */
class Dsignfly_Portfolio_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'Dsignfly_Portfolio_Widget', // Base ID.
			__( 'Portfolio Widget', 'portfolio' ), // Name.
			array( 'description' => __( 'Widget to show thumbnails of portfolio', 'portfolio' ) ) // Args.
		);
	}


	/**
	 * Displays the content in backend widget
	 *
	 * @param   array $instance   Previously saved values from database.
	 */
	public function form( $instance ) {

		echo '<p>Shows Portfolio Thumbnails</p>';

	}


	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		?>
		<div class="single-post-card">
			<h3 class="sidebar-heading">Portfolio</h3>
			<hr>
			<div class="portfolio-gallery">
				<?php
				$portfolio_query_options = array(
					'post_type'      => 'portfolio',
					'post_status'    => 'publish',
					'posts_per_page' => 8,
				);

				$portfolio_query = new WP_Query( $portfolio_query_options );
				if ( $portfolio_query->have_posts() ) {
					while ( $portfolio_query->have_posts() ) {
						$portfolio_query->the_post();
						?>
				<a href="<?php the_permalink(); ?>">
					<img class="portfolio-gallery-item" src="<?php the_post_thumbnail_url(); ?>" alt="">
				</a>
						<?php
					}
				}
				?>
			</div>
		</div>
		<?php
	}
}

/**
 * Register and load the widget
 */
function dsignfly_load_portfolio_widget() {
	register_widget( 'Dsignfly_Portfolio_Widget' );
}
add_action( 'widgets_init', 'dsignfly_load_portfolio_widget' );
?>
