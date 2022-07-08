<?php
/**
 * This is to display archive widget.
 *
 * @package dsignfly
 */

/**
 * Adds Foo_Widget widget.
 */
class Dsignfly_Archive_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'Dsignfly_Archive_Widget', // Base ID.
			__( 'Archive Widget', 'portfolio' ), // Name.
			array( 'description' => __( 'Widget to show Archive', 'portfolio' ) ) // Args.
		);
	}

	/**
	 * Displays the content in backend widget
	 *
	 * @param   array $instance   Previously saved values from database.
	 */
	public function form( $instance ) {

		echo '<p>Shows Monthly Archive</p>';

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
			<h3 class="sidebar-heading">Archive</h3>
			<hr>
			<ul class="sidebar-post-date">
				<?php
				wp_get_archives(
					array(
						'type' => 'monthly',
					)
				);
				?>
			</ul>
		</div>
		<?php
	}
}

/**
 * Register and load the widget
 */
function dsignfly_load_archive_widget() {
	register_widget( 'Dsignfly_Archive_Widget' );
}
add_action( 'widgets_init', 'dsignfly_load_archive_widget' );
?>
