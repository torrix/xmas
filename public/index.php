<?php

require __DIR__ . '/../vendor/autoload.php';

const HOST = 'http://192.168.1.111';

const COLOURS = [
    'red'    => [255, 0, 0],
    'yellow' => [255, 192, 0],
    'green'  => [0, 255, 0],
    'blue'   => [0, 0, 255],
    'purple' => [192, 0, 255],
    'white'  => [255, 255, 255],
];

$client = new GuzzleHttp\Client(['base_uri' => HOST]);

Flight::set('flight.views.path', __DIR__ . '/../src/views');

Flight::route('/', function () {
    Flight::render('index.php');
});

Flight::route('/wipe/@colour', function ($colour) use ($client) {
    $payload = [
        'seg' => [
            [
                'col' => [
                    COLOURS[$colour],
                ],
            ],
        ],
    ];
    $client->post('http://192.168.1.111/json', [
        GuzzleHttp\RequestOptions::JSON => $payload,
    ]);

    Flight::json($payload);
});

Flight::start();
