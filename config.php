<?php

spl_autoload_register(function ($class) {
	//Test si la class est un controller ou un modele
	if (strpos($class, "Controller") !== false ||  $class == 'App')
		include_once "controllers/".$class.".php";
    else
		include_once "models/".$class.".php";
});










