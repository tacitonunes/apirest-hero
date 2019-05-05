<?php ini_set( 'default_charset', 'utf-8');
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use function src\{
    slimConfiguration
};
use App\Controllers\{
    DiscController,
    //AlunoController,
    ExceptionController
};
//use Slim\Http\Request;

$app = new \Slim\App(slimConfiguration());

$app->get('/', function(Request $request, Response $response, array $args) {
    echo '
        <!DOCTYPE html>
        <html>
            <head>
                <style>
                *{
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 16pt;
                }
                </style>
                <meta charset="utf-8" />
                <title>API Rest - Tácito Nunes - FAETERJ-Rio</title>
            </head>
            <body>
                <p>Olá, mundo!</p>
            </body>
        </html>
    ';
});

$app->get('/exc', ExceptionController::class . ':test');

//========================== MÉTODOS GET ====================================
$app->get('/disciplina', DiscController::class . ':getDiscs');
$app->get('/disciplina/', DiscController::class . ':getDiscs');
$app->get('/disciplina/{cod}', DiscController::class . ':getDiscCOD');
$app->get('/disciplina/{cod}/', DiscController::class . ':getDiscCOD');

//========================== MÉTODOS POST ===================================
$app->post('/disciplina', DiscController::class . ':insereDisc');
$app->post('/disciplina/', DiscController::class . ':insereDisc');

//========================== MÉTODOS PUT ===================================
$app->put('/disciplina', DiscController::class . ':alteraDisc');
$app->put('/disciplina/', DiscController::class . ':alteraDisc');

//========================== MÉTODOS PUT ===================================
$app->delete('/disciplina', DiscController::class . ':deletaDisc');

$app->run();