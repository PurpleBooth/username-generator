<?php
// web/index.php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/', function() use($app) {
    $wordGenerator = function() {
        require_once dirname(__FILE__) . '/../vendor/gnugat/PronounceableWord/src/PronounceableWord/DependencyInjectionContainer.php';

        define('MINIMUM_LENGTH', 5);
        define('MAXIMUM_LENGTH', 11);

        $length = rand(MINIMUM_LENGTH, MAXIMUM_LENGTH);

        $container = new PronounceableWord_DependencyInjectionContainer();
        $generator = $container->getGenerator();
        return $generator->generateWordOfGivenLength($length);
    };

    $primaryWord = $wordGenerator();

    $wordLists = array(
        array(
            $wordGenerator(),
            $wordGenerator(),
            $wordGenerator(),
            $wordGenerator(),
            $wordGenerator(),
        ),
        array(
            $wordGenerator(),
            $wordGenerator(),
            $wordGenerator(),
            $wordGenerator(),
            $wordGenerator(),
        ),
        array(
            $wordGenerator(),
            $wordGenerator(),
            $wordGenerator(),
            $wordGenerator(),
            $wordGenerator(),
        ),
    );

    ob_start();
    include('../templates/main.phtml');
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
})->bind('homepage');

$app->run();
