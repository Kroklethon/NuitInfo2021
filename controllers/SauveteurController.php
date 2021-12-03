<?php

$data = null;

class SauveteurController {
	public function showAdd() {
		include_once "view/partials/header.php";
		include_once "view/add_form/add_sauveteur.php";
		include_once "view/partials/footer.php";
	}
	public function add() {
		global $db;
		if (securise($_GET["nom"]) && securise($_GET["prenom"]) &&
			isset($_GET["grade"]) && isset($_GET["date_naissance"]) &&
			isset($_GET["image"])) {
			
			$id = Model::auto_increment('personne');
			$stm = $db->prepare("INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `date_naissance`) 
				VALUES (".$id.",".$_GET["nom"].",".$_GET["prenom"].",".$_GET["date_naissance"].";");
			$stm->execute();
			
			$stm = $db->prepare("INSERT INTO `sauveteur` (`id_personne`, `grade`) 
				VALUES (".$id.",".$_GET["grade"].";");
			$stm->execute();

			header("Location: ?route=sauveteurs");			

		} else {
			include_once "view/partials/header.php";
			include_once "view/add_form/add_sauveteur.php";
			include_once "view/partials/footer.php";
		}
	}

	public function all() {
		$data = Sauveteur::all();
		include_once "view/partials/header.php";
		include_once "view/all/sauveteurs.php";
		include_once "view/partials/footer.php";
	}
}

