<?php

declare(strict_types=1);

namespace App\Core;

use Nette;
use Nette\Application\Routers\RouteList;
use App\AdminModule\Router\RouterFactory as AdminRouterFactory;

final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$router->add(AdminRouterFactory::createRouter());
		$router->addRoute('editProduct/[<id \d+>]', 'Product:edit');
		$router->addRoute('addProduct/', 'Product:add');
		$router->addRoute('product/[<id \d+>]', 'Product:default');
		$router->addRoute('category/[<id \d+>]', 'Category:default');
		$router->addRoute('user/[<id \d+>]', 'User:default');
		$router->addRoute('<presenter>/<action>[/<id>]', 'Home:default');
		return $router;
	}
}
