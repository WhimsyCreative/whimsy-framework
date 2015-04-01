<?php
/**
 * @package whimsy
 */
class Widget_Whimsy_About extends WP_Widget {

    // Create Widget
    function __construct() {
        parent::__construct(
            'widget_whimsy_about', // Base ID
            __( '(Whimsy) About Me', 'whimsy-framework' ), // Name
            array( 'description' => __( 'Your photo, a blurb about yourself, and a link for more info.', 'whimsy-framework' ), ) // Args
        );
    }
    // Widget Content
    public function widget( $args, $instance ) {

        echo $args[ 'before_widget' ];
    
        $whimsy_title       = apply_filters( 'widget_title', $instance[ 'whimsy_title' ]);
        $whimsy_image_url   = empty( $instance[ 'whimsy_image_url' ] ) ? '' : $instance[ 'whimsy_image_url' ];
        $whimsy_text        = empty( $instance[ 'whimsy_text' ] ) ? '' : $instance[ 'whimsy_text' ];
        $whimsy_more_link   = empty( $instance[ 'whimsy_more_link' ] ) ? '' : $instance[ 'whimsy_more_link' ];
        $whimsy_more        = empty( $instance[ 'whimsy_more' ] ) ? '' : $instance[ 'whimsy_more' ];
        
        if ( ! empty( $instance['whimsy_title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['whimsy_title'] ). $args['after_title'];
        }
        ?>

                <?php if( !empty( $whimsy_image_url ) ) : ?>
                <div class="whimsy-img">
                    <a href="<?php echo esc_url_raw( $whimsy_more_link ); ?>"><img src="<?php echo esc_url_raw( $whimsy_image_url ); ?>"></a>
                </div> <!-- .whimsy-img -->
                <?php endif; ?>
                <?php if( !empty( $whimsy_text ) ) : ?>
                <div class="whimsy-text">
                    <?php echo esc_attr( $whimsy_text ); ?>
                </div> <!-- .whimsy-text -->
                <?php endif; ?>
                <?php if( !empty( $whimsy_more_link ) ) : ?>
                <div class="whimsy-more">
                    <a href="<?php echo esc_url_raw( $whimsy_more_link ); ?>"><?php echo esc_attr( $whimsy_more ); ?></a>
                </div> <!-- .whimsy-more -->
                <?php endif; ?>

        <?php
            
            echo $args['after_widget'];

     }

        // Form for widget content
        public function form( $instance ) {

            $whimsy_title       = ! empty( $instance[ 'whimsy_title' ] ) ? $instance[ 'whimsy_title' ] : '';
            $whimsy_image_url   = ! empty( $instance[ 'whimsy_image_url' ] ) ? $instance[ 'whimsy_image_url' ] : '';
            $whimsy_more        = ! empty( $instance[ 'whimsy_more' ] ) ? $instance[ 'whimsy_more' ] : '';
            $whimsy_more_link   = ! empty( $instance[ 'whimsy_more_link' ] ) ? $instance[ 'whimsy_more_link' ] : '';
            $whimsy_text        = ! empty( $instance[ 'whimsy_text' ] ) ? $instance[ 'whimsy_text' ] : '';

        ?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'whimsy_title' ) ); ?>"><?php esc_html_e( 'Title:', 'whimsy-framework' ); ?></label> 
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'whimsy_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'whimsy_title' ) ); ?>" type="text" value="<?php echo esc_attr( $whimsy_title ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'whimsy_image_url' ) ); ?>"><?php esc_html_e( 'Image URL:', 'whimsy-framework' ); ?></label> 
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'whimsy_image_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'whimsy_image_url' ) ); ?>" type="text" value="<?php echo esc_attr( $whimsy_image_url ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'whimsy_text' ) ); ?>"><?php esc_html_e( 'Bio Blurb:', 'whimsy-framework' ); ?></label> 
                <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_text') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_text') ); ?>"><?php echo esc_attr($whimsy_text); ?></textarea>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'whimsy_more' ) ); ?>"><?php esc_html_e( 'Read More Text:', 'whimsy-framework' ); ?></label> 
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'whimsy_more' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'whimsy_more' ) ); ?>" type="text" value="<?php echo esc_attr( $whimsy_more ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'whimsy_more_link' ) ); ?>"><?php esc_html_e( 'Read More Link:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'whimsy_more_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'whimsy_more_link' ) ); ?>" type="text" value="<?php echo esc_attr( $whimsy_more_link ); ?>">
            </p>

        <?php       
    }

    // Update and save the widget
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance[ 'whimsy_title' ]     = ( ! empty( $new_instance[ 'whimsy_title' ] ) ) ? esc_attr( $new_instance[ 'whimsy_title' ] ) : '';
        $instance[ 'whimsy_image_url' ] = ( ! empty( $new_instance[ 'whimsy_image_url' ] ) ) ? esc_attr( $new_instance[ 'whimsy_image_url' ] ) : '';
        $instance[ 'whimsy_more' ]      = ( ! empty( $new_instance[ 'whimsy_more' ] ) ) ? esc_attr( $new_instance[ 'whimsy_more' ] ) : '';
        $instance[ 'whimsy_more_link' ] = ( ! empty( $new_instance[ 'whimsy_more_link' ] ) ) ? esc_attr( $new_instance[ 'whimsy_more_link' ] ) : '';
        $instance[ 'whimsy_text' ]      = ( ! empty( $new_instance[ 'whimsy_text' ] ) ) ? esc_textarea( $new_instance[ 'whimsy_text' ] ) : '';

        return $instance;
    }

}

// register Widget_Whimsy_About widget
function widget_whimsy_about() {
    register_widget( 'Widget_Whimsy_About' );
}
add_action( 'widgets_init', 'widget_whimsy_about' );