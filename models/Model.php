<?php
/*

Toute classe du modèle devra impérativement :
- avoir le même nom que la table avec une majuscule
- la table doit avoir une clé primaire nommée "id$table". Exemple : idbeer
- la table doit autoriser les champs nuls
- étendre la classe Model 

*/

class Model {
	public function __construct() {

	}

	public static function auto_increment($table) {
		global $db;
		$stm = $db->prepare("SELECT Auto_increment FROM information_schema.tables WHERE table_name='$table';");
		$stm->execute();	
		return $stm->fetch(PDO::FETCH_ASSOC)['Auto_increment'];
	}

	public static function create($id=null) {
		global $db;
		$class = get_called_class(); 
		$table = strtolower($class);
		if ($id===null) {
			$o = new $class();
			// CREATE = INSERT
			$stm = $db->prepare("insert into $table default values returning id_$table");
			$stm->execute();
			foreach($stm->fetch(PDO::FETCH_ASSOC) as $key=>$value) 
				$o->$key = $value;
			return $o;
		} else {
			// READ = SELECT
			$stm = $db->prepare("select * from $table where id_$table=:id");
			$stm->bindValue(":id", $id);
			$stm->execute();
			$row = $stm->fetch(PDO::FETCH_ASSOC);
			foreach($row as $key=>$value) $this->$key = $value;
		}
	}

	// Retourne un objet chargé depuis la base de données à partir de sont id
	public static function one($id) {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select * from $table where id_$table=:id");
		$st->bindValue(":id",$id);
		$st->execute();
		$row = $st->fetch(PDO::FETCH_ASSOC);
		if (!$row) 
			return null;
		else {
			$o = new $class();
			foreach($row as $key=>$value)
				$o->$key = $value;
			return $o;
		}
	}

	// Detruit un objet en la base de données à partir de son id
	public static function delete() {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select * from $table where id_$table=:id");
		$st->bindValue(":id",$id);
		$st->execute();
		$row = $st->fetch(PDO::FETCH_ASSOC);
		if (!$row) 
			return null;
		else {
			$o = new $class();
			foreach($row as $key=>$value)
				$o->$key = $value;
			return $o;
		}
	}

	// Retourne le contenu de la table
	public static function all() {
		$class = get_called_class();
		$table = strtolower($class);
		$st = db()->prepare("select * from $table");
		$st->execute();
		$list = array();
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			$o = new $class();
			$list[] = $o;
			foreach($row as $key=>$value)
				$o->$key = $value;
		}
		return $list;
	}

	// Enregistre un objet dans la base de données (en le créant si besoin)
	public function save() {
		$class = get_called_class();
		$table = strtolower($class);
		$id = "id_".$table;
		if (!isset($this->$id)) {
			$st = db()->prepare("insert into $table default values returning id_$table");
			$st->execute();
			$row = $st->fetch();
			$field = "id_".$table;
			$this->$field = $row[$field];
		}
		foreach(get_object_vars($this) as $key => $value) {
			$st = db()->prepare("update $table set $key=:val where id_$table=:id");
			$st->bindValue(":val", $value);
			$st->bindValue(":id", $this->$id);
			$st->execute();

		}
	}

	public function __get($attr) {
		return $this->$attr;
	}
	public function __set($attr, $value) {
		$this->$attr = $value;
	}

	public function __toString() {
		$s = "<h4>" . get_class($this) . "</h4>";
		$s .= "<ul>";
		foreach(get_object_vars($this) as $key => $value)
			$s .= "<li>" . $key . " = " . $value . "</li>";
		$s .= "</ul>";
		return $s;
	}
}