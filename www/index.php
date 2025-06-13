<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';


/* 
* session_start();
* session_destroy();
*/

$bootstrap = new App\Bootstrap;
$container = $bootstrap->bootWebApplication();
$application = $container->getByType(Nette\Application\Application::class);
$application->run();
