<?php


$db = new PDO(
	"mysql:host=localhost;
	dbname=nuit_info;
	port=3306","root"
);

function db() { global $db; return $db; }