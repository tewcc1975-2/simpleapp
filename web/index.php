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

$app->map('/contact', function() use ($app) {
    if(isset($_POST['message']) && !empty($_POST['message'])) {
        // we got a message

        // did we get an email?
        if($email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            // we did
            $feedback = "Thanks for your comment, we'll be in touch";
        } else {
            $feedback = "Thanks for your comment";
        }

        // pass feedback message to view
        $app->view->setData(array("feedback" => $feedback));
    }
    $app->render("contact.php");
})->via("GET","POST");

$app->run();

