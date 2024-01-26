<?php

use App\Controllers\GEOController;

class GEORouter {
    public function __construct()
    {
        add_action( 'rest_api_init', function () {
            register_rest_route( 'custom/v1', '/geo', array(
                'methods' => 'GET',
                'callback' => array($this, 'show'),
                'permission_callback' => function ($request) {
                    return ($request['_wpnonce'] || ENV['APP_ENV'] == 'dev') ? true : false;
                }
            ));
        });
    }

    public function show($request) {
        $data = (new GEOController())->show($request);

        return PandaRouter::__response($data);
    }
}
