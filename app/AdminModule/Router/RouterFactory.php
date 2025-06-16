<?php

declare(strict_types=1);

namespace App\AdminModule\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$admin = $router->withModule("Admin")->withPath("admin");
		$admin->addRoute('login', 'Sign:in');
		$admin->addRoute('product/<id>', 'Product:default');
		$admin->addRoute('<presenter>/<action>', 'Home:default');
		return $admin;
	}
}
