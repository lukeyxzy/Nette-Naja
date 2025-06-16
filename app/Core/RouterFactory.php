<?php

declare(strict_types=1);

namespace App\Core;

use Nette;
use Nette\Application\Routers\RouteList;
use App\AdminModule\Router\RouterFactory as AdminRouterFactory;
use App\FrontModule\Router\RouterFactory as FrontRouterFactory;

final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->add(FrontRouterFactory::createRouter());
		$router->add(AdminRouterFactory::createRouter());
		$router->addRoute('<presenter>/<action>[/<id>]', 'Front:Home:default');
		return $router;
	}
}
