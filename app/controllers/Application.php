<?php

/**
 * This file contains the main core of the application process
 * 
 * @package	app\controllers
 * @license https://mit-license.org/ MIT License
 * @author	Samuel Reka <rekasamuel0@gmail.com
 */

namespace app\controllers;

require "Router.php";
require "Request.php";

use app\controllers\Router;
use app\controllers\Request;

/**
 * Class Application
 */
class Application {

	public Router $router;
	public Request $request;
	public static string $ROOTPATH;

	public function __construct($DIR) {
		$this->router	= new Router($DIR);
		$this->request 	= new Request($DIR);
		self::$ROOTPATH = $DIR;
	}

	/**
	 * This method gets the given method, route and then render its view
	 * and if no view was found, a 404 page will be throwned
	 */
	public function run() {
		$path	  = $this->request->getPath();
		$method   = $this->request->getMethod();
		$callback = $this->router->getRoutes()[$method][$path] ?? false;

		if ($callback !== false) {
			$this->render(call_user_func($callback));
		} else {
			$this->request->getErrorPage();	// TODO Set status to 404
		}
	}

	/**
	 * This method replaces the given view in the base file and displays the final view
	 * @param string $view The view path as string
	 */
	public function render($view) {
		$footerContent	= $this->request->getFooter(self::$ROOTPATH . "/app/views/footer.html");
		$viewContent 	= $this->request->getContent($view);
		$baseLayout 	= $this->request->getLayout(self::$ROOTPATH . "/app/views/base.html");
		$routeName 		= $this->request->getRouteName();

		$arrayOrigin	= ["%LINK%", "%TITLE%", "%CONTENT%", "%FOOTER%"];
		$arrayReplace 	= [$routeName, ucfirst($routeName), $viewContent, $footerContent];

		$finalView = str_replace($arrayOrigin, $arrayReplace, $baseLayout);
		echo $finalView;
	}

}