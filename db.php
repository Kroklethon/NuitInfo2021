<?php

$db = new PDO(
	"mysql:host=$db_host;
	dbname=$db_name;
	port=3306","$db_user"
);

function db() { global $db; return $db; }