<?php
$app = new App();

$app->route("home", "SiteController", "index");
$app->route("sauvetages", "SiteController", "allSauvetages");