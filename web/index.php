<?php

require "../vendor/autoload.php";

$app = new \Slim\Slim(array(
    'templates.path' => '../templates'
));

$app->get('/', function () use ($app) {
    // just output the template
    $app->render('main.php');
});

$app->get('/hello', function () use ($app) {
    echo 'howdy!';
});

$app->get('/contact', function() use ($app) {
    $app->render("contact.php");
});

$app->run();

