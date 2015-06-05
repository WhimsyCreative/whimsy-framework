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
    
        /**
         * Included social networks: 
         * 
         * Twitter, Pinterest, Facebook, Google+, LinkedIn, 
         * Instagram, DeviantArt, Twitch, Vine, Behance, 
         * WordPress, YouTube, Tumblr, Reddit, Flickr, Medium
         * 
         */
        
        $whimsy_social_title        = apply_filters( 'widget_title' , $instance[ 'whimsy_social_title' ] );
        $whimsy_social_twitter      = empty( $instance[ 'whimsy_social_twitter' ]) ? '' : $instance[ 'whimsy_social_twitter' ];
        $whimsy_social_pinterest    = empty( $instance[ 'whimsy_social_pinterest' ]) ? '' : $instance[ 'whimsy_social_pinterest' ];
        $whimsy_social_facebook     = empty( $instance[ 'whimsy_social_facebook' ]) ? '' : $instance[ 'whimsy_social_facebook' ];
        $whimsy_social_google_plus  = empty( $instance[ 'whimsy_social_google_plus' ]) ? '' : $instance[ 'whimsy_social_google_plus' ];
        $whimsy_social_linkedin     = empty( $instance[ 'whimsy_social_linkedin' ]) ? '' : $instance[ 'whimsy_social_linkedin' ];
        $whimsy_social_instagram    = empty( $instance[ 'whimsy_social_instagram' ]) ? '' : $instance[ 'whimsy_social_instagram' ];
        $whimsy_social_deviantart   = empty( $instance[ 'whimsy_social_deviantart' ]) ? '' : $instance[ 'whimsy_social_deviantart' ];
        $whimsy_social_twitch       = empty( $instance[ 'whimsy_social_twitch' ]) ? '' : $instance[ 'whimsy_social_twitch' ];
        $whimsy_social_vine         = empty( $instance[ 'whimsy_social_vine' ]) ? '' : $instance[ 'whimsy_social_vine' ];
        $whimsy_social_behance      = empty( $instance[ 'whimsy_social_behance' ]) ? '' : $instance[ 'whimsy_social_behance' ];
        $whimsy_social_wordpress    = empty( $instance[ 'whimsy_social_wordpress' ]) ? '' : $instance[ 'whimsy_social_wordpress' ];
        $whimsy_social_youtube      = empty( $instance[ 'whimsy_social_youtube' ]) ? '' : $instance[ 'whimsy_social_youtube' ];
        $whimsy_social_tumblr       = empty( $instance[ 'whimsy_social_tumblr' ]) ? '' : $instance[ 'whimsy_social_tumblr' ];
        $whimsy_social_reddit       = empty( $instance[ 'whimsy_social_reddit' ]) ? '' : $instance[ 'whimsy_social_reddit' ];
        $whimsy_social_flickr       = empty( $instance[ 'whimsy_social_flickr' ]) ? '' : $instance[ 'whimsy_social_flickr' ];
        $whimsy_social_medium       = empty( $instance[ 'whimsy_social_medium' ]) ? '' : $instance[ 'whimsy_social_medium' ];

        if ( ! empty( $instance['whimsy_social_title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['whimsy_social_title'] ). $args['after_title'];
        }
        ?>
                <ul id="widget-whimsy-social">
                <?php 
                    if ($whimsy_social_twitter) {
                    echo '<li><a href="' . esc_url_raw( $whimsy_social_twitter ) . ' " title="Twitter"><i class="fa fa-twitter"></i></a></li>'; };
				    
                    if ($whimsy_social_pinterest) {
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_pinterest ) . ' " title="Pinterest"><i class="fa fa-pinterest-p"></i></a></li>'; };
				    
                    if ($whimsy_social_facebook) {					
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_facebook ) . ' " title="Facebook"><i class="fa fa-facebook"></i></a></li>'; };
				    
                    if ($whimsy_social_instagram) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_instagram ) . ' " title="Instagram"><i class="fa fa-instagram"></i></a></li>'; };
                    
                    if ($whimsy_social_google_plus) {                   
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_google_plus ) . ' " title="Google+"><i class="fa fa-google-plus"></i></a></li>'; };
                    
                    if ($whimsy_social_vine) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_vine ) . ' " title="Vine"><i class="fa fa-vine"></i></a></li>'; };
                    
                    if ($whimsy_social_tumblr) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_tumblr ) . ' " title="Tumblr"><i class="fa fa-tumblr"></i></a></li>'; };
                    
                    if ($whimsy_social_linkedin) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_linkedin ) . ' " title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>'; };
                    
                    if ($whimsy_social_deviantart) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_deviantart ) . ' " title="DeviantArt"><i class="fa fa-deviantart"></i></a></li>'; };
                    
                    if ($whimsy_social_behance) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_behance ) . ' " title="Behance"><i class="fa fa-behance"></i></a></li>'; };
                    
                    if ($whimsy_social_youtube) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_youtube ) . ' " title="YouTube"><i class="fa fa-youtube-play"></i></a></li>'; };
                    
                    if ($whimsy_social_twitch) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_twitch ) . ' " title="Twitch"><i class="fa fa-twitch"></i></a></li>'; };
                    
                    if ($whimsy_social_reddit) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_reddit ) . ' " title="Reddit"><i class="fa fa-reddit"></i></a></li>'; };
                    
                    if ($whimsy_social_flickr) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_flickr ) . ' " title="Flickr"><i class="fa fa-flickr"></i></a></li>'; };
                    
                    if ($whimsy_social_medium) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_medium ) . ' " title="Medium"><i class="fa fa-medium"></i></a></li>'; };
                    
                    if ($whimsy_social_wordpress) {                  
                    echo '<li><a href="'. esc_url_raw( $whimsy_social_wordpress ) . ' " title="WordPress"><i class="fa fa-wordpress"></i></a></li>'; 
                    
                    } ?>
                </ul>

        <?php
        echo $args['after_widget'];
     }

    // Widget form
    public function form( $instance ) {
        
        $whimsy_social_title            = ! empty( $instance[ 'whimsy_social_title' ] ) ?       $instance[ 'whimsy_social_title' ] : __( '', 'whimsy-framework' );
        $whimsy_social_twitter          = ! empty( $instance[ 'whimsy_social_twitter' ] ) ?     $instance[ 'whimsy_social_twitter' ] : __( 'Twitter:', 'whimsy-framework' );
        $whimsy_social_pinterest        = ! empty( $instance[ 'whimsy_social_pinterest' ] ) ?   $instance[ 'whimsy_social_pinterest' ] : __( 'Pinterest:', 'whimsy-framework' );
        $whimsy_social_facebook         = ! empty( $instance[ 'whimsy_social_facebook' ] ) ?    $instance[ 'whimsy_social_facebook' ] : __( 'Facebook:', 'whimsy-framework' );
        $whimsy_social_google_plus      = ! empty( $instance[ 'whimsy_social_google_plus' ] ) ? $instance[ 'whimsy_social_google_plus' ] : __( 'Google+:', 'whimsy-framework' );
        $whimsy_social_linkedin         = ! empty( $instance[ 'whimsy_social_linkedin' ] ) ?    $instance[ 'whimsy_social_linkedin' ] : __( 'LinkedIn:', 'whimsy-framework' );
        $whimsy_social_instagram        = ! empty( $instance[ 'whimsy_social_instagram' ] ) ?   $instance[ 'whimsy_social_instagram' ] : __( 'Instagram:', 'whimsy-framework' );
        $whimsy_social_deviantart       = ! empty( $instance[ 'whimsy_social_deviantart' ] ) ?  $instance[ 'whimsy_social_deviantart' ] : __( 'DeviantArt:', 'whimsy-framework' );
        $whimsy_social_twitch           = ! empty( $instance[ 'whimsy_social_twitch' ] ) ?      $instance[ 'whimsy_social_twitch' ] : __( 'Twitch:', 'whimsy-framework' );
        $whimsy_social_vine             = ! empty( $instance[ 'whimsy_social_vine' ] ) ?        $instance[ 'whimsy_social_vine' ] : __( 'Vine:', 'whimsy-framework' );
        $whimsy_social_behance          = ! empty( $instance[ 'whimsy_social_behance' ] ) ?     $instance[ 'whimsy_social_behance' ] : __( 'Behance:', 'whimsy-framework' );
        $whimsy_social_wordpress        = ! empty( $instance[ 'whimsy_social_wordpress' ] ) ?   $instance[ 'whimsy_social_wordpress' ] : __( 'WordPress:', 'whimsy-framework' );
        $whimsy_social_youtube          = ! empty( $instance[ 'whimsy_social_youtube' ] ) ?     $instance[ 'whimsy_social_youtube' ] : __( 'YouTube:', 'whimsy-framework' );
        $whimsy_social_tumblr           = ! empty( $instance[ 'whimsy_social_tumblr' ] ) ?      $instance[ 'whimsy_social_tumblr' ] : __( 'Tumblr:', 'whimsy-framework' );
        $whimsy_social_reddit           = ! empty( $instance[ 'whimsy_social_reddit' ] ) ?      $instance[ 'whimsy_social_reddit' ] : __( 'Reddit:', 'whimsy-framework' );
        $whimsy_social_flickr           = ! empty( $instance[ 'whimsy_social_flickr' ] ) ?      $instance[ 'whimsy_social_flickr' ] : __( 'Flickr:', 'whimsy-framework' );
        $whimsy_social_medium           = ! empty( $instance[ 'whimsy_social_medium' ] ) ?      $instance[ 'whimsy_social_medium' ] : __( 'Medium:', 'whimsy-framework' );

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
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_instagram') ); ?>"><?php esc_html_e( 'Instagram:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_instagram') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_instagram); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_google_plus') ); ?>"><?php esc_html_e( 'Google+:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_google_plus') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_google_plus') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_google_plus); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_vine') ); ?>"><?php esc_html_e( 'Vine:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_vine') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_vine') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_vine); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_tumblr') ); ?>"><?php esc_html_e( 'Tumblr:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_tumblr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_tumblr') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_tumblr); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_linkedin') ); ?>"><?php esc_html_e( 'LinkedIn:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_linkedin') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_linkedin); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_deviantart') ); ?>"><?php esc_html_e( 'DeviantArt:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_deviantart') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_deviantart') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_deviantart); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_behance') ); ?>"><?php esc_html_e( 'Behance:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_behance') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_behance') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_behance); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_youtube') ); ?>"><?php esc_html_e( 'YouTube:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_youtube') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_youtube); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_twitch') ); ?>"><?php esc_html_e( 'Twitch:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_linkedin') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_twitch') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_twitch); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_reddit') ); ?>"><?php esc_html_e( 'Reddit:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_reddit') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_reddit') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_reddit); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_flickr') ); ?>"><?php esc_html_e( 'Flickr:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_flickr') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_flickr') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_flickr); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_medium') ); ?>"><?php esc_html_e( 'Medium:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_medium') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_medium') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_medium); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('whimsy_social_wordpress') ); ?>"><?php esc_html_e( 'WordPress:', 'whimsy-framework' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('whimsy_social_wordpress') ); ?>" name="<?php echo esc_attr( $this->get_field_name('whimsy_social_wordpress') ); ?>" type="text" value="<?php echo esc_url_raw($whimsy_social_wordpress); ?>" />
            </p>

        <?php       
    }

    // Update and save the widget
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance[ 'whimsy_social_title' ]          = ( ! empty( $new_instance[ 'whimsy_social_title' ] ) ) ?       esc_attr( $new_instance[ 'whimsy_social_title' ] ) : '';
        $instance[ 'whimsy_social_twitter' ]        = ( ! empty( $new_instance[ 'whimsy_social_twitter' ] ) ) ?     esc_url_raw( $new_instance[ 'whimsy_social_twitter' ] ) : '';
        $instance[ 'whimsy_social_pinterest' ]      = ( ! empty( $new_instance[ 'whimsy_social_pinterest' ] ) ) ?   esc_url_raw( $new_instance[ 'whimsy_social_pinterest' ] ) : '';
        $instance[ 'whimsy_social_facebook' ]       = ( ! empty( $new_instance[ 'whimsy_social_facebook' ] ) ) ?    esc_url_raw( $new_instance[ 'whimsy_social_facebook' ] ) : '';
        $instance[ 'whimsy_social_google_plus' ]    = ( ! empty( $new_instance[ 'whimsy_social_google_plus' ] ) ) ? esc_url_raw( $new_instance[ 'whimsy_social_google_plus' ] ) : '';
        $instance[ 'whimsy_social_linkedin' ]       = ( ! empty( $new_instance[ 'whimsy_social_linkedin' ] ) ) ?    esc_url_raw( $new_instance[ 'whimsy_social_linkedin' ] ) : '';
        $instance[ 'whimsy_social_instagram' ]      = ( ! empty( $new_instance[ 'whimsy_social_instagram' ] ) ) ?   esc_url_raw( $new_instance[ 'whimsy_social_instagram' ] ) : '';
        $instance[ 'whimsy_social_deviantart' ]     = ( ! empty( $new_instance[ 'whimsy_social_deviantart' ] ) ) ?  esc_url_raw( $new_instance[ 'whimsy_social_deviantart' ] ) : '';
        $instance[ 'whimsy_social_twitch' ]         = ( ! empty( $new_instance[ 'whimsy_social_twitch' ] ) ) ?      esc_url_raw( $new_instance[ 'whimsy_social_twitch' ] ) : '';
        $instance[ 'whimsy_social_vine' ]           = ( ! empty( $new_instance[ 'whimsy_social_vine' ] ) ) ?        esc_url_raw( $new_instance[ 'whimsy_social_vine' ] ) : '';
        $instance[ 'whimsy_social_behance' ]        = ( ! empty( $new_instance[ 'whimsy_social_behance' ] ) ) ?     esc_url_raw( $new_instance[ 'whimsy_social_behance' ] ) : '';
        $instance[ 'whimsy_social_wordpress' ]      = ( ! empty( $new_instance[ 'whimsy_social_wordpress' ] ) ) ?   esc_url_raw( $new_instance[ 'whimsy_social_wordpress' ] ) : '';
        $instance[ 'whimsy_social_youtube' ]        = ( ! empty( $new_instance[ 'whimsy_social_youtube' ] ) ) ?     esc_url_raw( $new_instance[ 'whimsy_social_youtube' ] ) : '';
        $instance[ 'whimsy_social_reddit' ]         = ( ! empty( $new_instance[ 'whimsy_social_reddit' ] ) ) ?      esc_url_raw( $new_instance[ 'whimsy_social_reddit' ] ) : '';
        $instance[ 'whimsy_social_flickr' ]         = ( ! empty( $new_instance[ 'whimsy_social_flickr' ] ) ) ?      esc_url_raw( $new_instance[ 'whimsy_social_flickr' ] ) : '';
        $instance[ 'whimsy_social_medium' ]         = ( ! empty( $new_instance[ 'whimsy_social_medium' ] ) ) ?      esc_url_raw( $new_instance[ 'whimsy_social_medium' ] ) : '';

        return $instance;
    }
}

// register Widget_Whimsy_Social widget
function widget_whimsy_social() {
    register_widget( 'Widget_Whimsy_Social' );
}
add_action( 'widgets_init', 'widget_whimsy_social' );