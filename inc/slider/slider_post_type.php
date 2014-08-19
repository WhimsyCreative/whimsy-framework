<?php
 
// Create Custom Post Type
     
    function register_slides_posttype() {
        $labels = array(
            'name'              => _x( 'Slides', 'post type general name' ),
            'singular_name'     => _x( 'Slide', 'post type singular name' ),
            'add_new'           => __( 'Add New Slide' ),
            'add_new_item'      => __( 'Add New Slide' ),
            'edit_item'         => __( 'Edit Slide' ),
            'new_item'          => __( 'New Slide' ),
            'view_item'         => __( 'View Slide' ),
            'search_items'      => __( 'Search Slides' ),
            'not_found'         => __( 'Slide' ),
            'not_found_in_trash'=> __( 'Slide' ),
            'parent_item_colon' => __( 'Slide' ),
            'menu_name'         => __( 'Slides' )
        );
 
        $taxonomies = array();
 
        $supports = array('title','thumbnail');
 
        $post_type_args = array(
            'labels'            => $labels,
            'singular_label'    => __('Slide'),
            'public'            => true,
            'show_ui'           => true,
            'publicly_queryable'=> true,
            'query_var'         => true,
            'capability_type'   => 'post',
            'has_archive'       => false,
            'hierarchical'      => false,
            'rewrite'           => array( 'slug' => 'slides', 'with_front' => false ),
            'supports'          => $supports,
            'menu_position'     => 29, // Where it is in the menu. Change to 6 and it's below posts. 11 and it's below media, etc.
            'menu_icon'         => 'dashicons-slides',
            'taxonomies'        => $taxonomies
        );
        register_post_type('slides',$post_type_args);
    }
    add_action('init', 'register_slides_posttype');
	// Meta Box for Slider URL
     
    $slidelink_2_metabox = array(
        'id' => 'slidelink',
        'title' => 'Slide Link',
        'page' => array('slides'),
        'context' => 'normal',
        'priority' => 'default',
        'fields' => array(
     
                     
                    array(
                        'name'          => 'Slide URL',
                        'desc'          => 'Add a link to your slide.',
                        'id'                => 'whimsy_slideurl',
                        'class'             => 'whimsy_slideurl',
                        'type'          => 'text',
                        'rich_editor'   => 0,           
                        'max'           => 0,
						'desc-box'		=> 'http://'         
                    ),
                    )
    );         
                 
    add_action('admin_menu', 'whimsy_add_slidelink_2_meta_box');
    function whimsy_add_slidelink_2_meta_box() {
     
        global $slidelink_2_metabox;       
     
        foreach($slidelink_2_metabox['page'] as $page) {
            add_meta_box($slidelink_2_metabox['id'], $slidelink_2_metabox['title'], 'whimsy_show_slidelink_2_box', $page, 'normal', 'default', $slidelink_2_metabox);
        }
    }
     
    // function to show meta boxes
    function whimsy_show_slidelink_2_box()  {
        global $post;
        global $slidelink_2_metabox;
        global $whimsy_prefix;
        global $wp_version;
         
        // Use nonce for verification
        echo '<input type="hidden" name="whimsy_slidelink_2_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
         
        echo '<table class="form-table">';
     
        foreach ($slidelink_2_metabox['fields'] as $field) {
            // get current post meta data
     
            $meta = get_post_meta($post->ID, $field['id'], true);
             
            echo '<tr>',
                    '<th style="width:20%"><label for="', $field['id'], '">', stripslashes($field['name']), '</label></th>',
                    '<td class="whimsy_field_type_' . str_replace(' ', '_', $field['type']) . '">';
            switch ($field['type']) {
                case 'text':
                    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['desc-box'], '" size="30" style="width:97%" /><br/>', '', stripslashes($field['desc']);
                    break;
            }
            echo    '<td>',
                '</tr>';
        }
         
        echo '</table>';
    }  
    

	
	/**
 * Saves the custom meta input
 */
function whimsy_slidelink_2_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'whimsy_slidelink_2_meta_box_nonce' ] ) && wp_verify_nonce( $_POST[ 'whimsy_slidelink_2_meta_box_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'whimsy_slidelink_2_meta_box_nonce' ] ) ) {
        update_post_meta( $post_id, 'whimsy_slidelink_2_meta_box_nonce', sanitize_text_field( $_POST[ 'whimsy_slidelink_2_meta_box_nonce' ] ) );
    }
 
}
add_action( 'save_post', 'whimsy_slidelink_2_save' );