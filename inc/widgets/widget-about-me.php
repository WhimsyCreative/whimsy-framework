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
        $whimsy_image_url = strip_tags($instance['whimsy_image_url']);
        $whimsy_more = strip_tags($instance['whimsy_more']);
        $whimsy_more_link = strip_tags($instance['whimsy_more_link']);
        $whimsy_text = strip_tags($instance['whimsy_text']);

        ?>

            <div id="widget_whimsy_about" class="widget">

                <span class="whimsy-img">
                    <a href="<?php echo $whimsy_more_link; ?>"><img src="<?php echo $whimsy_image_url; ?>"></a>
                </span> <!-- .whimsy-img -->

                <span class="whimsy-text">
                    <?php echo $whimsy_text; ?>
                </span> <!-- .whimsy-text -->
                
                <span class="whimsy-more">
                    <a href="<?php echo $whimsy_more_link; ?>"><?php echo $whimsy_more; ?></a>
                </span> <!-- .whimsy-more -->

            </div> <!-- #whimsy-about-box -->

        <?php
     }

    // Update and save the widget
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    // If widget content needs a form
    function form($instance) {
        //widgetform in backend
		
		$whimsy_image_url = isset( $instance['whimsy_image_url'] ) ? esc_attr( $instance['whimsy_image_url'] ) : '';
		$whimsy_more = isset( $instance['whimsy_more'] ) ? esc_attr( $instance['whimsy_more'] ) : 'Read More';
		$whimsy_more_link = isset( $instance['whimsy_more_link'] ) ? esc_attr( $instance['whimsy_more_link'] ) : '';
		$whimsy_text = isset( $instance['whimsy_text'] ) ? esc_attr( $instance['whimsy_text'] ) : '';
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_image_url'); ?>">Image URL: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_image_url'); ?>" name="<?php echo $this->get_field_name('whimsy_image_url'); ?>" type="text" value="<?php echo attribute_escape($whimsy_image_url); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_text'); ?>">Bio Blurb: </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('whimsy_text'); ?>" name="<?php echo $this->get_field_name('whimsy_text'); ?>"><?php echo attribute_escape($whimsy_text); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_more'); ?>">Read More Title: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_more'); ?>" name="<?php echo $this->get_field_name('whimsy_more'); ?>" type="text" value="<?php echo attribute_escape($whimsy_more); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_more_link'); ?>">Read More Link: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_more_link'); ?>" name="<?php echo $this->get_field_name('whimsy_more_link'); ?>" type="text" value="<?php echo attribute_escape($whimsy_more_link); ?>" />
            </p>

        <?php       
    }

}

register_widget('widget_whimsy_about');