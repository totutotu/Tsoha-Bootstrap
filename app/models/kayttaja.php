<?php

class Kayttaja extends BaseModel {

	public $kayttajatunnus, $salasana;

	public function __construct($attributes) {
		parent::__construct($attributes);
		$this->validators = array('validate_kayttajatunnus', 'validate_salasana');
	}

	public static function all() {
		$query = DB::connection()->prepare('SELECT * FROM Kayttaja');
		$query->execute();
		$rows = $query->fetchAll();
		$kayttajat = array();

		foreach($rows as $row) {
			$kayttajat[] = new Kayttaja(array(
				'kayttajatunnus' => $row['kayttajatunnus'],
				'salasana' => $row['salasana']
				));
		}
		return $kayttajat;
	}

	public static function find($tunnus) {
	    $query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE kayttajatunnus = :tunnus LIMIT 1');
        $query->execute(array('tunnus' => $tunnus));
        $row = $query->fetch();

        if($row) {
        	$kayttaja = new Kayttaja(array(
        		'kayttajatunnus' => $row['kayttajatunnus'],
        		'salasana' => $row['salasana']
        ));

        return $kayttaja;
        }

        return null;
	}

  public function save() {
  	$query = DB::connection()->prepare('INSERT INTO kayttaja(kayttajatunnus,
  	 salasana) VALUES (:kayttajatunnus, :salasana) RETURNING kayttajatunnus');
	$query->execute(array('kayttajatunnus' => $this->kayttajatunnus, 'salasana'=>$this->salasana));

	$row = $query->fetch();

	$this->kayttajatunnus = $row['kayttajatunnus'];
	}

	public function validate_kayttajatunnus(){
 	 $errors = parent::validate_string_length($this->kayttajatunnus, 5);
 	 Kint::dump($errors);
 	 return $errors;
  }

  public function validate_salasana(){
 	 $errors = parent::validate_string_length($this->salasana, 6);
 	 return $errors;
  }

}