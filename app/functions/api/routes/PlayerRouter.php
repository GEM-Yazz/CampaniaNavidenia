<?php

use App\Controllers\PlayerController;

class PlayerRouter {
    public function __construct()
    {
        add_action('rest_api_init', function () {
            register_rest_route('custom/v1', '/players', array(
                'methods' => 'POST',
                'callback' => array($this, 'store'),
                'permission_callback' => function ($request) {
                    return ($request['_wpnonce'] || ENV['APP_ENV'] == 'dev') ? true : false;
                },
                'args'  => $this::__getArgs([
                    'player_firstname',
                    'player_lastname',
                    'player_dni',
                    'player_phone',
                    'player_email',
                    'player_age',
                    'player_department',
                    'player_province',
                    'player_district',
                    'player_terms',
                    'player_politics',
                    'player_target_relationship',
                    'player_target_fullname',
                    'player_target_age',
                    'player_target_genre',
                    'player_target_behaviour1',
                    'player_target_behaviour2',
                    'player_target_behaviour3',
                    'player_target_activity1',
                    'player_target_activity2',
                    'player_target_activity3',
                    'player_target_importance',
                ])
            ));

            register_rest_route( 'custom/v1', '/players', array(
                'methods' => 'GET',
                'callback' => array($this, 'index'),
                'permission_callback' => function ($request) {
                    return ($request['_wpnonce'] || ENV['APP_ENV'] == 'dev') ? true : false;
                }
            ));

            register_rest_route( 'custom/v1', '/players/download', array(
                'methods' => 'GET',
                'callback' => array($this, 'downloadParticipants'),
                'permission_callback' => function ($request) {
                    return true;
                }
            ));
        });
    }

    public function store($request) {
        $data = (new PlayerController())->store($request);

        return PandaRouter::__response($data);
    }

    public function index($request) {
        $data = (new PlayerController())->index($request);

        return PandaRouter::__response($data);
    }

    public function downloadParticipants($request) {
        $data = (new PlayerController())->download($request);
    }

    private function __getArgs($selectedRules) {
        $rules = [
            'player_firstname' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_lastname' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_dni' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_phone' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_email' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_age' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_department' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_province' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_district' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_terms' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_politics' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_relationship' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_fullname' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_age' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_genre' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_behaviour1' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_behaviour2' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_behaviour3' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_activity1' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_activity2' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_activity3' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
            'player_target_importance' => [
                'required'          => true,
                'type'              => 'string',
                'validate_callback' => function($param, $request, $key) {
                    return is_string($param);
                },
            ],
        ];

        return $selectedRules
            ? array_intersect_key($rules, array_flip($selectedRules))
            : $rules;
    }
}
