<?php
class App {	 
	public function route($route, $controller, $action) {
		if (!isset($_GET["route"]))
			$_GET = [ "route" => "home" ];

		if ($_GET["route"] == $route)
			(new $controller())->$action();		
	}
}

function securise($value) {
	return isset($value) && !empty($value);
}
