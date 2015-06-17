<?php
class Viesti extends BaseModel {

	public $id, $lahettaja, $vastaanottaja, $aihe, $sisalto, $lahetetty, $luettu;

	public function __construct($attributes) {
		parent::__construct($attributes);
		$this->validators = array('validate_aihe', 'validate_sisalto');

		
	}

	public static function find($id) {
	    $query = DB::connection()->prepare('SELECT * FROM viesti WHERE id = :id LIMIT 1');
	    $query->execute(array('id' => $id));
        $row = $query->fetch();

        if($row) {
        	$viesti = new Viesti(array(
        		'id' => $row['id'],
				'lahettaja' => $row['lahettaja'],
				'vastaanottaja' => $row['vastaanottaja'],
				'aihe' => $row['aihe'],
				'sisalto' => $row['sisalto'],
	    	));

        return $viesti;
        }

        return null;
	}

	public static function findall($vastaanottaja) {
	    $query = DB::connection()->prepare('SELECT * FROM viesti WHERE vastaanottaja = :vastaanottaja');
		$query->execute(array('vastaanottaja' => $vastaanottaja));
        $rows = $query->fetchAll();
        $viestit = array();

        foreach($rows as $row) {
			$viestit[] = new Viesti(array(
				'id' => $row['id'],
				'lahettaja' => $row['lahettaja'],
				'aihe' => $row['aihe'],
				'sisalto' => $row['sisalto'],
				));
		

        return $viestit;
        
        }

        return null;
	}

	public function save() {
  	$query = DB::connection()->prepare('INSERT INTO Viesti(id, lahettaja, vastaanottaja, aihe, sisalto) VALUES (:lahettaja, :vastaanottaja, :aihe, :sisalto) RETURNING id');
	$query->execute(array('id' => 'DEFAÙLT', 'lahettaja' => $_SESSION['kayttaja'], 'vastaanottaja' => $this->vastaanottaja, 'aihe' => 
		 $this->aihe, 'sisalto' => $this->sisalto));

	$row = $query->fetch();

	$this->id = $row['id'];
	}

	public function validate_aihe(){
 		$errors = parent::validate_string_length($this->aihe, 5, 'Aiheen');
		$errors = array_merge($errors, parent::validate_string_length_max($this->aihe, 30, 'Aiheen'));

 		Kint::dump($errors);
 		return $errors;
  }
  	public function validate_sisalto(){
 		$errors = parent::validate_string_length($this->kayttajatunnus, 5, 'Viestin sisällön');
		$errors = array_merge($errors, parent::validate_string_length_max($this->kayttajatunnus, 3, 'Viestin sisällön'));

 		Kint::dump($errors);
 		return $errors;
  }

  	public function destroy() {

		$query  = DB::connection()->prepare('DELETE FROM Viesti WHERE lahettaja = :lahettaja');
  		$query->execute(array('lahettaja' => $this->lahettaja));
		$row = $query->fetch();
	}
}