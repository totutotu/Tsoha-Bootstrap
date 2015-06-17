<?php
class Yhteiso extends BaseModel {

	public $id, $nimi, $yllapitaja, $esittely;

	public function __construct($attributes) {
		parent::__construct($attributes);
		$this->validators = array('validate_nimi');
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
        $query->execute(array('id' => $id));
        
        $rows = $query->fetchAll();
        $yhteisot = array();

		foreach ($yhteisot as $yhteiso) {

			$yhteisot[] = new Yhteiso(array(
				'id' => $row['id'],
				'nimi' => $row['nimi'],
				'yllapitaja' => $row['yllapitaja'],
				'esittely' => $row['esittely']
        ));
        return $yhteisot;
        }
        return null;
	}


	public static function findall($yllapitaja) {
	    $query = DB::connection()->prepare('SELECT * FROM yhteisosivu WHERE yllapitaja = :yllapitaja');
        $query->execute(array('yllapitaja' => $yllapitaja));
        $row = $query->fetch();
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

  public function validate_nimi(){
 	$errors = parent::validate_string_length($this->nimi, 5, 'Yhteisön nimen');
	$errors = array_merge($errors, parent::validate_string_length_max($this->nimi, 20, 'Yhteisön nimen'));
    Kint::dump($errors);
  
 	return $errors;
  }

 public function destroy() {
  	$query  = DB::connection()->prepare('DELETE FROM Yhteisosivu WHERE yllapitaja = :yllapitaja');
  	$query->execute(array('yllapitaja' => $this->yllapitaja));
	$row = $query->fetch();
 }

}