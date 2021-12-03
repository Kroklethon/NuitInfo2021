<?php

$data = null;

class SiteController {
	public function index() {
		include_once "../view/partials/header.php";
		include_once "../view/home.php";
		include_once "../view/partials/footer.php";
	}
	public function allSauvetages() {
		var_dump('TEST');
		die();
		$data = Sauvetage::all();
		include_once "../view/partials/header.php";
		include_once "../view/all/sauvetages.php";
		include_once "../view/partials/footer.php";
	}
}

