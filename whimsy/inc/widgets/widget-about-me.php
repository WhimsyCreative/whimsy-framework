<?php
/**
 * @package whimsy
 */
class widget_whimsy_about extends WP_Widget {

    // Create Widget
    function widget_whimsy_about() {
        parent::WP_Widget(false, $name = '(Whimsy) About Me', array('description' => 'Your photo, a blurb about yourself, and a link for more info!'));
    }

    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        $whimsy_title = sanitize_text_field($instance['whimsy_title']);
        $whimsy_image_url = sanitize_text_field($instance['whimsy_image_url']);
        $whimsy_more = sanitize_text_field($instance['whimsy_more']);
        $whimsy_more_link = sanitize_text_field($instance['whimsy_more_link']);
        $whimsy_text = sanitize_text_field($instance['whimsy_text'], '<a><p><br><span>');

        ?>

            <div id="widget_whimsy_about" class="widget">
                
                <?php if( !empty( $whimsy_title ) ) : ?>
                <h3 class="whimsy-title"><?php echo esc_html($whimsy_title); ?></h3><!-- .whimsy-title -->
                <?php endif; ?>
                <?php if( !empty( $whimsy_image_url ) ) : ?>
                <div class="whimsy-img">
                    <a href="<?php echo esc_url('$whimsy_more_link'); ?>"><img src="<?php echo esc_url($whimsy_image_url); ?>"></a>
                </div> <!-- .whimsy-img -->
                <?php endif; ?>
                <?php if( !empty( $whimsy_text ) ) : ?>
                <div class="whimsy-text">
                    <?php echo esc_attr($whimsy_text); ?>
                </div> <!-- .whimsy-text -->
                <?php endif; ?>
                <?php if( !empty( $whimsy_more_link ) ) : ?>
                <div class="whimsy-more">
                    <a href="<?php echo esc_url($whimsy_more_link); ?>"><?php echo esc_attr($whimsy_more); ?></a>
                </div> <!-- .whimsy-more -->
                <?php endif; ?>

            </div> <!-- #whimsy-about-box -->

        <?php
     }

    // Update and save the widget
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    // If widget content needs a form
    function form($instance) {

        // Check values

        //widgetform in backend
        $whimsy_title = isset( $instance['whimsy_title'] ) ? esc_html( $instance['whimsy_title'] ) : '';
        $whimsy_image_url = isset( $instance['whimsy_image_url'] ) ? esc_url( $instance['whimsy_image_url'] ) : '';
		$whimsy_more = isset( $instance['whimsy_more'] ) ? esc_attr( $instance['whimsy_more'] ) : 'Read More';
		$whimsy_more_link = isset( $instance['whimsy_more_link'] ) ? esc_url( $instance['whimsy_more_link'] ) : '';
		$whimsy_text = isset( $instance['whimsy_text'] ) ? esc_attr( $instance['whimsy_text'] ) : '';
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_title'); ?>"><?php _e('Title', 'whimsy'); ?></label></p>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_title'); ?>" name="<?php echo $this->get_field_name('whimsy_title'); ?>" type="text" value="<?php echo esc_html($whimsy_title); ?>" />
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_image_url'); ?>"><?php _e('Image', 'whimsy'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_image_url'); ?>" name="<?php echo $this->get_field_name('whimsy_image_url'); ?>" type="text" value="<?php echo esc_url($whimsy_image_url); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_text'); ?>"><?php _e('Bio Blurb', 'whimsy'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('whimsy_text'); ?>" name="<?php echo $this->get_field_name('whimsy_text'); ?>"><?php echo esc_attr($whimsy_text); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_more'); ?>"><?php _e('<em>Read More</em> Text', 'whimsy'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_more'); ?>" name="<?php echo $this->get_field_name('whimsy_more'); ?>" type="text" value="<?php echo esc_attr($whimsy_more); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_more_link'); ?>"><?php _e('<em>Read More</em> Link', 'whimsy'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_more_link'); ?>" name="<?php echo $this->get_field_name('whimsy_more_link'); ?>" type="text" value="<?php echo esc_attr($whimsy_more_link); ?>" />
            </p>

        <?php       
    }

}

register_widget('widget_whimsy_about');