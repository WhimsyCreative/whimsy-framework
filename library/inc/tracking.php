<?php

// Create a helper function for easy SDK access.
function whimsy_framework() {
    global $whimsy_framework;

    if ( ! isset( $whimsy_framework ) ) {
        // Include Freemius SDK.
        require_once dirname(dirname(dirname(__FILE__))) . '/freemius/start.php';

        $whimsy_framework = fs_dynamic_init( array(
            'id'                  => '818',
            'slug'                => 'whimsy-framework',
            'type'                => 'theme',
            'public_key'          => 'pk_34b9d048febd4f348c687313cf262',
            'is_premium'          => false,
            'has_premium_version' => false,
            'has_addons'          => true,
            'has_paid_plans'      => false,
            'menu'                => array(
                'contact'        => false,
                'support'        => false,
            ),
        ) );
    }

    return $whimsy_framework;
}

// Init Freemius.
whimsy_framework();