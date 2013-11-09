<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'user' => 'root',
        'password' => 'fuckoff',
        'dbname' => 'silex',
        'charset' => 'utf-8',
    ),
));
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
$app->before(function () use ($app) {
    $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout.twig'));
});

$app->get('/', function() use ($app) {
	return $app['twig']->render('index.twig', array(
        'title' => 'Main page',
    ));
});

$app->get('/add', function() use ($app) {
    return 'Add news';
});



$app['debug'] = true;
$app->run();

?>
