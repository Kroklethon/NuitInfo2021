<?php

class Personne extends Model {
	public function save() {
		$stm = db()->prepare("
			update Personne
			set nom=:nom,
			    prenom=:prenom,
				date_naissance=:date_naissance
				image=:image
			where id_personne=:id_personne
			");
		$stm->bindValue(":nom", $this->nom);
		$stm->bindValue(":prenom", $this->prenom);
		$stm->bindValue(":date_naissance", $this->date_naissance);
		$stm->bindValue(":image", $this->image);
		$stm->bindValue(":id_personne", $this->id_personne);
		$stm->execute();
	}
}