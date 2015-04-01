<?php
/**
 * @package whimsy-framework
 */
class Widget_Whimsy_Social extends WP_Widget {

    // Create Widget
    function __construct() {
        parent::__construct(
            'widget_whimsy_social', // Base ID
            __( '(Whimsy) Social Networks', 'whimsy-framework' ), // Name
            array( 'description' => __( 'Display links to your social network profiles.', 'whimsy-framework' ), ) // Args
        );
    }

    // Widget Content
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
    
        $whimsy_social_title        = apply_filters( 'widget_title' , $instance[ 'whimsy_social_title' ] );
        $whimsy_social_twitter      = empty( $instance[ 'whimsy_social_twitter' ]) ? '' : $instance[ 'whimsy_social_twitter' ];
        $whimsy_social_pinterest    = empty( $instance[ 'whimsy_social_pinterest' ]) ? '' : $instance[ 'whimsy_social_pinterest' ];
        $whimsy_social_facebook     = empty( $instance[ 'whimsy_social_facebook' ]) ? '' : $instance[ 'whimsy_social_facebook' ];
        $whimsy_social_google_plus  = empty( $instance[ 'whimsy_social_google_plus' ]) ? '' : $instance[ 'whimsy_social_google_plus' ];
        $whimsy_social_linkedin     = empty( $instance[ 'whimsy_social_linkedin' ]) ? '' : $instance[ 'whimsy_social_linkedin' ];
        
        if ( ! empty( $instance['whimsy_social_title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['whimsy_social_title'] ). $args['after_title'];
        }
        ?>
                <ul id="widget-whimsy-social">
                <?php if ($whimsy_social_twitter) {
                    echo '<li><a href="' . esc_url_raw( $whimsy_social_twitter ) . ' "><i class="fa fa-twitter"></i></a></li>'; };
				    if ($whimsy_social_pinterest) {
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_pinterest ) . ' "><i class="fa fa-pinterest"></i></a></li>'; };
				    if ($whimsy_social_facebook) {					
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_facebook ) . ' "><i class="fa fa-facebook"></i></a></li>'; };
				    if ($whimsy_social_google_plus) {					
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_google_plus ) . ' "><i class="fa fa-google-plus"></i></a></li>'; };
				    if ($whimsy_social_linkedin) {					
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_linkedin ) . ' "><i class="fa fa-linkedin"></i></a></li>'; 
					} ?>
                </ul>

        <?php
        echo $args['after_widget'];
     }

    // Widget form
    public function form( $instance ) {
        
        $whimsy_social_title        = ! empty( $instance[ 'whimsy_social_title' ] ) ? $instance[ 'whimsy_social_title' ] : __( '', 'whimsy-framework' );
        $whimsy_social_twitter      = ! empty( $instance[ 'whimsy_social_twitter' ] ) ? $instance[ 'whimsy_social_twitter' ] : __( 'Twitter:', 'whimsy-framework' );
        $whimsy_social_pinterest    = ! empty( $instance[ 'whimsy_social_pinterest' ] ) ? $instance[ 'whimsy_social_pinterest' ] : __( 'Pinterest:', 'whimsy-framework' );
        $whimsy_social_facebook     = ! empty( $instance[ 'whimsy_social_facebook' ] ) ? $instance[ 'whimsy_social_facebook' ] : __( 'Facebook:', 'whimsy-framework' );
        $whimsy_social_google_plus  = ! empty( $instance[ 'whimsy_social_google_plus' ] ) ? $instance[ 'whimsy_social_google_plus' ] : __( 'Google+:', 'whimsy-framework' );
        $whimsy_social_linkedin     = ! empty( $instance[ 'whimsy_social_linkedin' ] ) ? $instance[ 'whimsy_social_linkedin' ] : __( 'LinkedIn:', 'whimsy-framework' );

        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'whimsy_social_title' ) ); ?>"><?php esc_html_e( 'Title:', 'whimsy-framework' ); ?></label> 
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'whimsy_social_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'whimsy_social_title' ) ); ?>" type="text" value="<?php echo esc_attr( $whimsy_social_title ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_twitter') ); ?>"><?php esc_html_e( 'Twitter:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_twitter') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_twitter); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_pinterest') ); ?>"><?php esc_html_e( 'Pinterest:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_pinterest') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_pinterest') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_pinterest); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_facebook') ); ?>"><?php esc_html_e( 'Facebook:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_facebook') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_facebook); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_google_plus') ); ?>"><?php esc_html_e( 'Google+:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_google_plus') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_google_plus') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_google_plus); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_linkedin') ); ?>"><?php esc_html_e( 'LinkedIn:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_linkedin') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_linkedin); ?>" />
            </p>

        <?php       
    }

    // Update and save the widget
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance[ 'whimsy_social_title' ]        = ( ! empty( $new_instance[ 'whimsy_social_title' ] ) ) ? esc_attr( $new_instance[ 'whimsy_social_title' ] ) : '';
        $instance[ 'whimsy_social_twitter' ]      = ( ! empty( $new_instance[ 'whimsy_social_twitter' ] ) ) ? esc_url_raw( $new_instance[ 'whimsy_social_twitter' ] ) : '';
        $instance[ 'whimsy_social_pinterest' ]    = ( ! empty( $new_instance[ 'whimsy_social_pinterest' ] ) ) ? esc_url_raw( $new_instance[ 'whimsy_social_pinterest' ] ) : '';
        $instance[ 'whimsy_social_facebook' ]     = ( ! empty( $new_instance[ 'whimsy_social_facebook' ] ) ) ? esc_url_raw( $new_instance[ 'whimsy_social_facebook' ] ) : '';
        $instance[ 'whimsy_social_google_plus' ]  = ( ! empty( $new_instance[ 'whimsy_social_google_plus' ] ) ) ? esc_url_raw( $new_instance[ 'whimsy_social_google_plus' ] ) : '';
        $instance[ 'whimsy_social_linkedin' ]     = ( ! empty( $new_instance[ 'whimsy_social_linkedin' ] ) ) ? esc_url_raw( $new_instance[ 'whimsy_social_linkedin' ] ) : '';

        return $instance;
    }
}

// register Widget_Whimsy_Social widget
function widget_whimsy_social() {
    register_widget( 'Widget_Whimsy_Social' );
}
add_action( 'widgets_init', 'widget_whimsy_social' );