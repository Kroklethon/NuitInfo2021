<?php
$app = new App();

$app->route("home", "SiteController", "index");
$app->route("sauvetages", "SiteController", "allSauvetages");
$app->route("sauveteurs", "SauveteurController", "all");
$app->route("showAddSauveteur", "SauveteurController", "showAdd");
$app->route("addSauveteur", "SauveteurController", "add");
$app->route("cartes", "SiteController", "afficheCarte");
