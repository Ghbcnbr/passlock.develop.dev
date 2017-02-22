<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use Phalcon\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Router;

$loader = new Loader();

$loader->registerDirs(
        [
             "../app/controllers/",
             "../app/models/",
        ]
);

$loader->register();




// Create a DI
$di = new FactoryDefault();
// Setup the view component
$di->set("view", function () {
    $view = new View();
    $view->setViewsDir("../app/views/");
    return $view;
}
);


// Setup a base URI so that all generated URIs include the "tutorial" folder
$di->set(
        "url", function () {
    $url = new UrlProvider();
    $url->setBaseUri("/tutorial/");

    return $url;
}
);


$router = new Router();
$router->add(
        "/gg/ww/ee/", [
             "controller" => "zhopa",
             "action" => "huj"
        ]
);

$router->handle();

$application = new Application($di);

$response = $application->handle();

$response->send();
