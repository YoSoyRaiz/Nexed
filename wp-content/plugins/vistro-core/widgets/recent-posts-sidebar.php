<?php
/**
* xriver-companion
* @since 1.0.0
*/

Class Latest_posts_sidebar_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct( 'tc-latest-posts', ''.tf_theme_name().' Recent Posts ('.tf_theme_name().')', [
            'description' => 'Recent Post Widget by '.tf_theme_name().'',
        ] );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        echo $before_widget;
		?>
		<?php
			if ( $instance['title'] ):
				echo $before_title;?>
						<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
					<?php echo $after_title; ?>
				<?php endif; ?>

		<div class="tx-recent-posts post-widget latest-post">
			<?php
				$q = new WP_Query( [
				'post_type'      => 'post',
				'posts_per_page' => ( $instance['count'] ) ? $instance['count'] : '5',
				'order'          => ( $instance['posts_order'] ) ? $instance['posts_order'] : 'DESC',
				'orderby'        => 'date',
				'ignore_sticky_posts' => 1,
			] );

			if ( $q->have_posts() ):
				while ( $q->have_posts() ): $q->the_post();
				$id = get_the_ID();

				$title_length = ( $instance['title_length'] ) ? $instance['title_length'] : '10';

				if ( has_post_thumbnail() ) {
					$class = 'has-thumbnail';
				} else {
					$class = 'no-thumbnail';
				}
			?>
			<div class="latest-post-item wow fadeInUp <?php echo esc_attr($class); ?>" id="<?php echo esc_attr('post-'.$id); ?>">
				<?php if ( has_post_thumbnail() ): ?>
				<div class="img wow fadeIn" data-wow-delay=".2s">
					<a class="d-inline-block" href="<?php the_permalink();?>">
						<?php the_post_thumbnail( 'thumbnail' );?>
					</a>
				</div>
				<?php endif; ?>
				<div class="content">
					<span class="date"><i class="fal fa-clock"></i> <?php the_time( get_option( 'date_format' ) );?></span>
					<h6 class="title h1-heading " >
						<a href="<?php the_permalink();?>"><?php print wp_trim_words( get_the_title(), $title_length, '' );?></a>
					</h6>
				</div>
			</div>
			<?php endwhile;
			endif; ?>

			<?php wp_reset_postdata(); ?>

		</div>



		<?php echo $after_widget; ?>

		<?php
}

    public function form( $instance ) {
        $title = !empty( $instance['title'] ) ? $instance['title'] : '';
        $count = !empty( $instance['count'] ) ? $instance['count'] : esc_html__( '3', VISTRO_CORE_TEXT_DOMAIN );
		$title_length = !empty( $instance['title_length'] ) ? $instance['title_length'] : esc_html__( '10', VISTRO_CORE_TEXT_DOMAIN );
        $posts_order = !empty( $instance['posts_order'] ) ? $instance['posts_order'] : esc_html__( 'DESC', VISTRO_CORE_TEXT_DOMAIN );
        ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__('Title', 'tf-companion'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php echo esc_html__('How many posts you want to show ?', 'tf-companion'); ?></label>
			<input type="number" name="<?php echo $this->get_field_name( 'count' ); ?>" id="<?php echo $this->get_field_id( 'count' ); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_length' ); ?>"><?php echo esc_html__('Title Length', 'tf-companion'); ?></label>
			<input type="number" name="<?php echo $this->get_field_name( 'title_length' ); ?>" id="<?php echo $this->get_field_id( 'title_length' ); ?>" value="<?php echo esc_attr( $title_length ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'posts_order' ); ?>"><?php echo esc_html__('Posts Order', 'tf-companion'); ?></label>
			<select name="<?php echo $this->get_field_name( 'posts_order' ); ?>" id="<?php echo $this->get_field_id( 'posts_order' ); ?>" class="widefat">
				<option value="" disabled="disabled"><?php echo esc_html__('Select Post Order', 'tf-companion'); ?></option>
				<option value="ASC" <?php if ( $posts_order === 'ASC' ) {echo 'selected="selected"';}?>><?php echo esc_html__('ASC', 'tf-companion'); ?></option>
				<option value="DESC" <?php if ( $posts_order === 'DESC' ) {echo 'selected="selected"';}?>><?php echo esc_html__('DESC', 'tf-companion'); ?></option>
			</select>
		</p>

	<?php }

}

add_action( 'widgets_init', function () {
    register_widget( 'Latest_posts_sidebar_Widget' );
} );