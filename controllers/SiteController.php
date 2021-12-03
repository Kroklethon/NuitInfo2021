<?php

$data = null;

class SiteController {
	public function index() {
		include_once "view/partials/header.php";
		include_once "view/home.php";
		include_once "view/partials/footer.php";
	}
	public function allSauvetages() {
		$data = Sauvetage::all();
		include_once "view/partials/header.php";
		include_once "view/all/sauvetages.php";
		include_once "view/partials/footer.php";
	}
	public function allSauveteurs() {
		$data = Sauvetage::all();
		include_once "view/partials/header.php";
		include_once "view/all/sauveteurs.php";
		include_once "view/partials/footer.php";
	}
	public function afficheCarte() {
		$data = Sauvetage::all();
		include_once "view/partials/header.php";
		include_once "view/single/cartes.php";
		include_once "view/partials/footer.php";
	}
}

