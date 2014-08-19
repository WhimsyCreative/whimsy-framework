<?php
/**
 * @package whimsy
 */
class widget_whimsy_social extends WP_Widget {

    // Create Widget
    function widget_whimsy_social() {
        parent::WP_Widget(false, $name = '(Whimsy) Social Networks', array('description' => 'Displays links to your social network profiles.'));
    }

    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        $whimsy_social_twitter = strip_tags($instance['whimsy_social_twitter']);
        $whimsy_social_pinterest = strip_tags($instance['whimsy_social_pinterest']);
        $whimsy_social_facebook = strip_tags($instance['whimsy_social_facebook']);
        $whimsy_social_google_plus = strip_tags($instance['whimsy_social_google_plus']);
        $whimsy_social_linkedin = strip_tags($instance['whimsy_social_linkedin']);

        ?>

            <div id="widget-whimsy-social" class="widget">
                <ul>
                <?php if ($whimsy_social_twitter) {
                   echo '<li><a href="'.$whimsy_social_twitter.'"><i class="fa fa-twitter"></i></a></li>'; };
				    if ($whimsy_social_pinterest) {
                    echo '<li><a href="'.$whimsy_social_pinterest.'"><i class="fa fa-pinterest"></i></a></li>'; };
				    if ($whimsy_social_facebook) {					
                    echo '<li><a href="'.$whimsy_social_facebook.'"><i class="fa fa-facebook"></i></a></li>'; };
				    if ($whimsy_social_google_plus) {					
                    echo '<li><a href="'.$whimsy_social_google_plus.'"><i class="fa fa-google-plus"></i></a></li>'; };
				    if ($whimsy_social_linkedin) {					
                    echo '<li><a href="'.$whimsy_social_linkedin.'"><i class="fa fa-linkedin"></i></a></li>'; 
					} ?>
                </ul>
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
		
		$whimsy_social_twitter = isset( $instance['whimsy_social_twitter'] ) ? esc_attr( $instance['whimsy_social_twitter'] ) : '';
		$whimsy_social_pinterest = isset( $instance['whimsy_social_pinterest'] ) ? esc_attr( $instance['whimsy_social_pinterest'] ) : '';
		$whimsy_social_facebook = isset( $instance['whimsy_social_facebook'] ) ? esc_attr( $instance['whimsy_social_facebook'] ) : '';
		$whimsy_social_google_plus = isset( $instance['whimsy_social_google_plus'] ) ? esc_attr( $instance['whimsy_social_google_plus'] ) : '';
		$whimsy_social_linkedin = isset( $instance['whimsy_social_linkedin'] ) ? esc_attr( $instance['whimsy_social_linkedin'] ) : '';
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_social_twitter'); ?>">Twitter: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_social_twitter'); ?>" name="<?php echo $this->get_field_name('whimsy_social_twitter'); ?>" type="text" value="<?php echo attribute_escape($whimsy_social_twitter); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_social_pinterest'); ?>">Pinterest: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_social_pinterest'); ?>" name="<?php echo $this->get_field_name('whimsy_social_pinterest'); ?>" type="text" value="<?php echo attribute_escape($whimsy_social_pinterest); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_social_facebook'); ?>">Facebook: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_social_facebook'); ?>" name="<?php echo $this->get_field_name('whimsy_social_facebook'); ?>" type="text" value="<?php echo attribute_escape($whimsy_social_facebook); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_social_google_plus'); ?>">Google+: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_social_google_plus'); ?>" name="<?php echo $this->get_field_name('whimsy_social_google_plus'); ?>" type="text" value="<?php echo attribute_escape($whimsy_social_google_plus); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('whimsy_social_linkedin'); ?>">LinkedIn: </label>
                <input class="widefat" id="<?php echo $this->get_field_id('whimsy_social_linkedin'); ?>" name="<?php echo $this->get_field_name('whimsy_social_linkedin'); ?>" type="text" value="<?php echo attribute_escape($whimsy_social_linkedin); ?>" />
            </p>

        <?php       
    }

}

register_widget('widget_whimsy_social');