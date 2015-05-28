<?php

class Kayttaja extends BaseModel {

	public $kayttajatunnus, $salasana;

	public function __construct($attributes) {
		parent::__construct($attributes);
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
}