<?php

declare(strict_types=1);

namespace App\FrontModule\Router;

use Nette;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;
		$front = $router->withModule("Front");
		$front->addRoute('editProduct/[<id \d+>]', 'Product:edit');
		$front->addRoute('addProduct/', 'Product:add');
		$front->addRoute('product/[<id \d+>]', 'Product:default');
		$front->addRoute('category/[<id \d+>]', 'Category:default');
		$front->addRoute('user/[<id \d+>]', 'User:default');
		$front->addRoute('<presenter>/<action>[/<id>]', 'Home:default');
		return $front;
	}
}
