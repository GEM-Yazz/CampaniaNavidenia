<?php

class ParticipantsOptionPage {
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    }

    public function add_plugin_page() {
        if (current_user_can( 'manage_options' )) {
            add_menu_page(
                'Participantes',
                'Participantes',
                'manage_options',
                'participants',
                array( $this, 'create_admin_page' ),
                'dashicons-tickets',
                3
            );
        }
    }

    public function create_admin_page() {
        include_once __DIR__.'/view.php';
    }
    
}

if ( is_admin()) {
    $examples = new ParticipantsOptionPage();
}
