<?php

namespace App\Controllers;

use App\Models\Player;
use App\Models\PlayerTarget;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require(__DIR__ . '/../../libs/email.php');

class PlayerController {
    public function __construct() { }

    public function store($request) {
        $relationship = $request['player_target_relationship'];

        $gift = $this::__getGift($request);

        if ($gift) {
            $player = new Player();

            $player->firstname     = $request['player_firstname'];
            $player->lastname      = $request['player_lastname'];
            $player->dni           = $request['player_dni'];
            $player->phone         = $request['player_phone'];
            $player->email         = $request['player_email'];
            $player->age           = $request['player_age'];
            $player->department    = $request['player_department'];
            $player->province      = $request['player_province'];
            $player->district      = $request['player_district'];

            $player->terms     = $request['player_terms'];
            $player->politics  = $request['player_politics'];

            $player->save();

            if ($player) {
                $playerTarget = new PlayerTarget();

                $playerTarget->player_id    = $player->id;
                $playerTarget->fullname     = $request['player_target_fullname'];
                $playerTarget->age          = $request['player_target_age'];
                $playerTarget->relationship = $relationship;
                $playerTarget->genre        = $request['player_target_genre'];

                $playerTarget->behaviour1   = $request['player_target_behaviour1'];
                $playerTarget->behaviour2   = $request['player_target_behaviour2'];
                $playerTarget->behaviour3   = $request['player_target_behaviour3'];

                $playerTarget->activity1    = $request['player_target_activity1'];
                $playerTarget->activity2    = $request['player_target_activity2'];
                $playerTarget->activity3    = $request['player_target_activity3'];

                $playerTarget->importance   = $request['player_target_importance'];
                $playerTarget->gift         = $gift->{'name'};

                $playerTarget->save();

                if ($playerTarget && $this::__sendNotify($request)) {
                    return (object)[
                        'message'   => 'Player saved',
                        'data'      => $gift,
                        'status'    => true
                    ];
                } else {
                    return (object)[
                        'code'      => 404,
                        'message'   => 'No player saved',
                        'status'    => false
                    ];
                }
                
            } else {
                return (object)[
                    'code'      => 404,
                    'message'   => 'No player saved',
                    'status'    => false
                ];
            }
        } else {
            return (object)[
                'code'      => 404,
                'message'   => 'No gift found',
                'status'    => false
            ];
        }
    }

    public function index($request) {
        $players = [];

        if (isset($request['page']) && $request['page'] > 1) {
            $skip = ($request['page'] - 1) * 25;

            $players = Player::orderBy('id', 'desc')
                ->skip($skip)
                ->take(25)
                ->get();

        } else {
            $players = Player::orderBy('id', 'desc')
                ->limit(25)
                ->get();
        }

        if (count($players)) {
            $playersArray = $this::__formatPlayers($players, true);

            return (object)[
                'message'   => 'players here!!!',
                'data'      => $playersArray,
                'status'    => true,
            ];
        } else {
            return (object)[
                'code'      => 'no_players_found',
                'status'    => false,
            ];
        }
    }

    public function download() {
        $players = Player::orderBy('created_at', 'desc')
            ->get();

        $players = $this::__formatPlayers($players, false);

        if ($players) {
            header('Content-Encoding: UTF-8');
            header("Content-Type: application/xls; charset=UTF-8");
            header("Content-Disposition: attachment; filename=participants-".date('Y-m-d').".xls"); 
            echo "\xEF\xBB\xBF";

            include_once __DIR__ . "/../../assets/templates/players.php";
        } else {
            return (object)[
                'code'      => 'no_participants_found',
                'status'    => false,
            ];
        } 
    }

    private function __getGift($request) {
        $data = json_decode( file_get_contents(__DIR__ . '/../../assets/json/gifts.json') );
        $dataMapped = [];

        $request['player_target_relationship'] = in_array($request['player_target_relationship'], ['a1-a', 'a1-b', 'a1-c']) ? 'a1' : $request['player_target_relationship'];

        foreach ($data->{'p1'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p1'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p2'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p2'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p3'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p3'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p4'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p4'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p5'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p5'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p6'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p6'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p7'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p7'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p8'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p8'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p9'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p9'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p10'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p10'}->{'score'} += $item->{'value'};
            }
        }

        foreach ($data->{'p11'}->{'data'} as $question) {
            foreach ($question->{'data'} as $item) {
                if ($item->{'key'} == $request[$question->{'label'}]) $data->{'p11'}->{'score'} += $item->{'value'};
            }
        }

        for ($i=0; $i < 11; $i++) { 
            array_push($dataMapped, $data->{'p' . ($i + 1)}->{'score'});
        }

        $maxKey = array_search(max($dataMapped), $dataMapped);

        if (($maxKey + 1) == 6 && $request['player_target_genre'] == 'a2') {
            return [
                "name"     => "Parlantes PL7W",
                "image"    => "p6-girl",
                "link"     => "https://www.lg.com/pe/equipos-de-sonido/lg-pl7w",
                "details"   => [
                    "30W de Sonido",
                    "Bajos de Doble Acción",
                    "Batería con duración de hasta 24 horas",
                    "Luces multicolor",
                    "Resistencia a salpicaduras de agua IPX5"
                ],
            ];
        } else {
            return $data->{'p' . ($maxKey + 1)};
        }
    }

    private function __sendNotify($request) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();

            $mail->CharSet      = 'UTF-8';
            $mail->SMTPDebug    = 0;
            $mail->Host         = ENV['MAIL_HOST'];
            $mail->SMTPAuth     = true;
            $mail->Username     = ENV['MAIL_USER'];
            $mail->Password     = ENV['MAIL_PASSWORD'];
            $mail->SMTPSecure   = ENV['MAIL_ENCRYPTATION'];
            $mail->Port         = 465;

            $mail->setFrom(ENV['MAIL_USER'], "LG");
            $mail->addAddress($request['player_email']);

            $body = __getEmailTemplate('registered');

            $mail->isHTML(true); 
            $mail->Subject = "¡Registro exitoso!";
            $mail->MsgHTML($body);

            $mail->send();

            return true;
        } catch (Exception $e) {
            throw false;
        }
    }

    private function __getLabel($label, $value) {
        $payload    = '';
        $value      = str_replace(' ', '', $value);

        switch ($label) {
            case 'age':
                switch ($value) {
                    case 'a1':
                        $payload = 'Menos de 10';
                        break;

                    case 'a2':
                        $payload = '10 a 18';
                        break;

                    case 'a3':
                        $payload = '19 a 28';
                        break;

                    case 'a4':
                        $payload = '29 a 50';
                        break;

                    case 'a5':
                        $payload = '51 a más';
                        break;
                }
                break;

            case 'relationship':
                switch ($value) {
                    case 'a1':
                        $payload = 'Para mi';
                        break;

                    case 'a1-a':
                        $payload = 'Amigo o Amiga';
                        break;

                    case 'a1-b':
                        $payload = 'Pareja';
                        break;

                    case 'a1-c':
                        $payload = 'Otro';
                        break;

                    case 'a2':
                        $payload = 'Hermana o Hermano';
                        break;

                    case 'a3':
                        $payload = 'Papá o mamá';
                        break;

                    case 'a4':
                        $payload = 'Hijo o Hija';
                        break;
                }
                break;

            case 'genre':
                switch ($value) {
                    case 'a1':
                        $payload = 'Masculino';
                        break;

                    case 'a2':
                        $payload = 'Femenino';
                        break;
                }
                break;

            case 'behaviour1':
                switch ($value) {
                    case 'a1':
                        $payload = 'Estudioso(a)';
                        break;

                    case 'a2':
                        $payload = 'Amante de la limpieza';
                        break;

                    case 'a3':
                        $payload = 'Deportista';
                        break;

                    case 'a4':
                        $payload = 'Cinefilo(a)';
                        break;
                }
                break;

            case 'behaviour2':
                switch ($value) {
                    case 'a1':
                        $payload = 'Gamer';
                        break;

                    case 'a2':
                        $payload = 'Viajero(a)';
                        break;

                    case 'a3':
                        $payload = 'Hogareño(a)';
                        break;

                    case 'a4':
                        $payload = 'Comelon(a)';
                        break;
                }
                break;

            case 'behaviour3':
                switch ($value) {
                    case 'a1':
                        $payload = 'Alegre';
                        break;

                    case 'a2':
                        $payload = 'Workhaloic';
                        break;

                    case 'a3':
                        $payload = 'Chef';
                        break;

                    case 'a4':
                        $payload = 'Ordenado(a)';
                        break;
                }
                break;

            case 'activity1':
                switch ($value) {
                    case 'a1':
                        $payload = 'Limpiar la casa y ordenar todo';
                        break;

                    case 'a2':
                        $payload = 'Estudiar o leer';
                        break;

                    case 'a3':
                        $payload = 'Estar con la familia';
                        break;

                    case 'a4':
                        $payload = 'Salir con amigos';
                        break;
                }
                break;

            case 'activity2':
                switch ($value) {
                    case 'a1':
                        $payload = 'Jugar videojuegos';
                        break;

                    case 'a2':
                        $payload = 'Cocinar algun platillo';
                        break;

                    case 'a3':
                        $payload = 'Salir a correr o hacer algun deporte';
                        break;

                    case 'a4':
                        $payload = 'Emprender algun negocio';
                        break;
                }
                break;

            case 'activity3':
                switch ($value) {
                    case 'a1':
                        $payload = 'Escuchar musica';
                        break;

                    case 'a2':
                        $payload = 'Ver peliculas o series';
                        break;

                    case 'a3':
                        $payload = 'Viajar y conocer algun lugar';
                        break;

                    case 'a4':
                        $payload = 'Comer comida rápida';
                        break;
                }
                break;
        }

        return $payload;
    }

    private function __formatPlayers($players, $masking) {
        $playersArray = [];

        foreach($players as $player) {
            $dniLength      = strlen($player->dni);
            $emailLength    = strlen($player->email);
            $phoneLength    = strlen($player->phone);

            if ($masking) {
                $player->dni   = sprintf('%s***%s', $player->dni[0], $player->dni[$dniLength - 1]);
                $player->email = sprintf('%s***%s', $player->email[0], $player->email[$emailLength - 1]);
                $player->phone = sprintf('%s***%s', $player->phone[0], $player->phone[$phoneLength - 1]);
            }

            $player->friend = PlayerTarget::where('player_id', $player->id)->first();

            if ($player->friend && $player->friend->id) {
                $player->friend->age            = $this::__getLabel('age', $player->friend->age);
                $player->friend->genre          = $this::__getLabel('genre', $player->friend->genre);
                $player->friend->relationship   = $this::__getLabel('relationship', $player->friend->relationship);
                $player->friend->behaviour1     = $this::__getLabel('behaviour1', $player->friend->behaviour1);
                $player->friend->behaviour2     = $this::__getLabel('behaviour2', $player->friend->behaviour2);
                $player->friend->behaviour3     = $this::__getLabel('behaviour3', $player->friend->behaviour3);

                $player->friend->activity1 = $this::__getLabel('activity1', $player->friend->activity1);
                $player->friend->activity2 = $this::__getLabel('activity2', $player->friend->activity2);
                $player->friend->activity3 = $this::__getLabel('activity3', $player->friend->activity3);

                $player->friend->importance = ($player->friend->importance == -1) ? 'Vacio' : $player->friend->importance;

                array_push($playersArray, $player);
            }
        }

        return $playersArray;
    }
}
