<?php
/**
 * This is to render the recent post widget in the sidebar
 *
 * @package dsignfly
 */

/**
 * Adds recent post widget.
 */
class Dsignfly_Recent_Post_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'Dsignfly_Recent_Post_Widget', // Base ID.
			__( 'Recent Post Widget', 'portfolio' ), // Name.
			array( 'description' => __( 'Widget to show recent post portfolio', 'portfolio' ) ) // Args.
		);
	}


	/**
	 * Displays the content in backend widget
	 *
	 * @param   array $instance   Previously saved values from database.
	 */
	public function form( $instance ) {

		echo '<p>Shows Recent Posts</p>';

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
			<h3 class="sidebar-heading">Popular Posts</h3>
			<hr>
				<?php
				$recent_post_query_options = array(
					'post_type'      => 'portfolio',
					'post_status'    => 'publish',
					'posts_per_page' => 5,
				);

				$recent_post_query = new WP_Query( $recent_post_query_options );
				if ( $recent_post_query->have_posts() ) {
					while ( $recent_post_query->have_posts() ) {
						$recent_post_query->the_post();
						?>
				<div class="row">
					<div class="image-box">
						<img class="recent-post-image" src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" alt="">
					</div>
					<div class="recent-post-details">
					<span class="recent-post-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></span><br>
					<span class="recent-post-details    ">by <?php the_author(); ?> on <?php echo get_the_date(); ?></span>
					</div>
				</div>
						<?php
					}
				}
				?>
		</div>
		<?php
	}
}

/**
 * Register and load the widget
 */
function dsignfly_load_recent_post_widget() {
	register_widget( 'Dsignfly_Recent_Post_Widget' );
}
add_action( 'widgets_init', 'dsignfly_load_recent_post_widget' );
?>
