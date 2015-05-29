<?php
class Yhteiso extends BaseModel {

	public $id, $nimi, $yllapitaja, $esittely;

	public function __construct($attributes) {
		parent::__construct($attributes);
	}

	public static function all() {

		$query = DB::connection()->prepare('SELECT * FROM yhteisosivu');
		$query->execute();
		$rows = $query->fetchAll();
		$yhteisot = array();

		foreach($rows as $row) {
			$yhteisot[] = new Yhteiso(array(
				'id' => $row['id'],
				'nimi' => $row['nimi'],
				'yllapitaja' => $row['yllapitaja'],
				'esittely' => $row['esittely']
				));
		}
		Kint::dump($yhteisot);
		return $yhteisot;
	}

	public static function find($id) {
	    $query = DB::connection()->prepare('SELECT * FROM yhteisosivu WHERE id = :id LIMIT 1');
        $row = $query->fetch();
        $query->execute(array('id' => $id));

        if($row) {
			$yhteiso= new Yhteiso(array(
				'id' => $row['id'],
				'nimi' => $row['nimi'],
				'yllapitaja' => $row['yllapitaja'],
				'esittely' => $row['esittely']
        ));
        return $yhteiso;
        }



        return null;
	}

	public function jasenet($id) {
	    $query = DB::connection()->prepare('SELECT COUNT(*) FROM jasenet WHERE id = :id');
}

	public function save() {
  	$query = DB::connection()->prepare('INSERT INTO yhteisosivu(nimi, yllapitaja, esittely) VALUES (:nimi, :yllapitaja, :esittely) RETURNING id');
	$query->execute(array('nimi' => $this->nimi, 'yllapitaja' => $this->yllapitaja, 'esittely' => 
		 $this->esittely));

	$row = $query->fetch();

	$this->id = $row['id'];
	Kint::trace();
	Kint::dump($row);
	}
}