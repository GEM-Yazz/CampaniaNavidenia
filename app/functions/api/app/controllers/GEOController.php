<?php

namespace App\Controllers;

class GEOController {
    public function __construct() { }

    public function show($request) {
        $data = [];

        if ( isset( $request['dep'] ) ) {
            $data = json_decode( file_get_contents(__DIR__ . '/../../assets/json/ubigeo/provincias.json') )->{ $request['dep'] };
        } else if( isset( $request['prov'] ) ) {
            $data = json_decode( file_get_contents(__DIR__ . '/../../assets/json/ubigeo/distritos.json') )->{ $request['prov'] };
        } else {
            $data = json_decode( file_get_contents(__DIR__ . '/../../assets/json/ubigeo/departamentos.json') );
        }

        if ( count($data) ) {
            return (object)[
                'message'   => 'GEO Data here',
                'data'      => $data,
                'status'    => true
            ];
        } else {
            return (object)[
                'message'   => 'No GEO Data found',
                'status'    => false
            ];
        }
    }
}
