<?php
// Create a helper function for easy SDK access.
function whimsy_freemius_sdk() {
    global $whimsy_freemius_sdk;

    if ( ! isset( $whimsy_freemius_sdk ) ) {
        // Include Freemius SDK.
        require_once get_template_directory() . '/library/inc/tracking/start.php';

        $whimsy_freemius_sdk = fs_dynamic_init( array(
            'id'                  => '818',
            'slug'                => 'whimsy-framework',
            'type'                => 'theme',
            'public_key'          => 'pk_34b9d048febd4f348c687313cf262',
            'is_premium'          => false,
            'has_premium_version' => false,
            'has_addons'          => true,
            'has_paid_plans'      => false,
            'menu'                => array(
                'slug'           => 'whimsy-framework',
                'account'        => false,
                'contact'        => false,
                'support'        => false,
                'parent'         => array(
                    'slug' => 'themes.php',
                ),
            ),
        ) );
    }

    return $whimsy_freemius_sdk;
}

// Init Freemius.
whimsy_freemius_sdk();