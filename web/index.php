<?php

require "../vendor/autoload.php";

$app = new \Slim\Slim(array(
    "templates.path" => "../templates"
));

$app->get('/', function () use ($app) {
    // just output the template
    $app->render("main.php");
});

$app->get('/hello', function () use ($app) {
    echo "Nice to see you";
});

$app->run();

