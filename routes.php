<?php
$app = new App();

$app->route("home", "SiteController", "index");
$app->route("sauvetages", "SiteController", "allSauvetages");
$app->route("sauveteurs", "SiteController", "allSauveteurs");
$app->route("cartes", "SiteController", "afficheCarte");