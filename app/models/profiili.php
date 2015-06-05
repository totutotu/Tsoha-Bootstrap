<?php
class Profiili extends BaseModel {

	public $kayttajatunnus, $ika, $etunimi, $sukunimi,
	$sukupuoli, $esittelyteksti, $hakee, $status;

	public function __construct($attributes) {
		parent::__construct($attributes);
		$this->validators = array('validate_ika');
	}

	public static function all() {
		$query = DB::connection()->prepare('SELECT * FROM Profiili');
		$query->execute();
		$rows = $query->fetchAll();
		$profiilit = array();

		foreach($rows as $row) {
			$profiilit[] = new Profiili(array(
				'kayttajatunnus' => $row['kayttajatunnus'],
				'etunimi' => $row['etunimi'],
				'sukunimi' => $row['sukunimi'],
				'ika' => $row['ika'],
				'sukupuoli' => $row['sukupuoli'],
				'esittelyteksti' => $row['esittelyteksti'],
				'hakee' => $row['hakee'],
				'status' => $row['status']
				));
		}
		return $profiilit;
	}

	public static function find($tunnus) {
	    $query = DB::connection()->prepare('SELECT * FROM Profiili WHERE kayttajatunnus = :tunnus LIMIT 1');
        $query->execute(array('tunnus' => $tunnus));
        $row = $query->fetch();

        if($row) {
        	$profiili = new Profiili(array(
        		'kayttajatunnus' => $row['kayttajatunnus'],
				'etunimi' => $row['etunimi'],
				'sukunimi' => $row['sukunimi'],
				'ika' => $row['ika'],
				'sukupuoli' => $row['sukupuoli'],
				'esittelyteksti' => $row['esittelyteksti'],
				'hakee' => $row['hakee'],
				'status' => $row['status']
        ));

        return $profiili;
        }

        return null;
	}

	public function save() {
  	$query = DB::connection()->prepare('INSERT INTO profiili(kayttajatunnus, etunimi, sukunimi, ika, 
  		sukupuoli, esittelyteksti, hakee, status) VALUES (:kayttajatunnus, :etunimi, :sukunimi, :ika, 
  		:sukupuoli, :esittelyteksti, :hakee, :status) RETURNING kayttajatunnus');
	$query->execute(array('kayttajatunnus' => $this->kayttajatunnus, 'etunimi' => $this->etunimi, 'sukunimi' => 
		 $this->sukunimi, 'ika' => $this->ika, 'sukupuoli' => $this->sukupuoli, 'esittelyteksti' => $this->esittelyteksti,
		 'hakee' => $this->hakee, 'status' => $this->status));

	$row = $query->fetch();

	$this->kayttajatunnus = $row['kayttajatunnus'];
	Kint::trace();
	Kint::dump($row);
	}

	public function paivita() {
		$query = DB::connection()->prepare('UPDATE profiili SET status = 
			:status, hakee = :hakee,
			esittelyteksti = :esittelyteksti WHERE kayttajatunnus = :kayttajatunnus');
		$query->execute(array('kayttajatunnus' => $this->kayttajatunnus, 'esittelyteksti' => $this->esittelyteksti,
		 'hakee' => $this->hakee, 'status' => $this->status));
		$row = $query->fetch();

		Kint::dump($query);

		$profiili = new Profiili(array(
        		'kayttajatunnus' => $row['kayttajatunnus'],
				'etunimi' => $row['etunimi'],
				'sukunimi' => $row['sukunimi'],
				'ika' => $row['ika'],
				'sukupuoli' => $row['sukupuoli'],
				'esittelyteksti' => $row['esittelyteksti'],
				'hakee' => $row['hakee'],
				'status' => $row['status']
        ));


		return $profiili;


		
	}

  public function validate_ika()  {
    $errors = array();
    if(!is_numeric($this->ika)) {
      $errors[] = 'Syötä ikä väliltä 5-90';
    } else if($this->ika == null) {
      $errors[] = 'Syötä ikä.';
    }else if($this->ika < 5 || $this->ika > 90 ) {
      $errors[] = 'Syötä ikä väliltä 5-90';
    }
    
    Kint::dump($errors);

    return $errors;
  }

}