<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function() use ($app) {
	return 'Hello World!';
});

$app->get('/asd', function(Request $request) {
    return ($request);
});


$app['debug'] = true;
$app->run();

?>
