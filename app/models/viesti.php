<?php
class Viesti extends BaseModel {

	public $id, $lahettaja, $vastaanottaja, $aihe, $sisalto, $lahetetty, $luettu;

	public function __construct($attributes) {
		parent::__construct($attributes);
		
	}

	public static function find($id) {
	    $query = DB::connection()->prepare('SELECT * FROM viesti WHERE id = :id');
	    $query->execute(array('id' => $id));
        $row = $query->fetch();

        if($row) {
        	$viesti = new Viesti(array(
        		'id' => $row['id'],
				'lahettaja' => $row['lahettaja'],
				'vastaanottaja' => $row['vastaanottaja'],
				'aihe' => $row['aihe'],
				'sisalto' => $row['sisalto'],
				'lahetetty' => $row['lahetetty'],
				'luettu' => $row['luettu'],
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
				'lahettaja' => $row['lahettaja'],
				'vastaanottaja' => $row['vastaanottaja'],
				'aihe' => $row['aihe'],
				'sisalto' => $row['sisalto'],
				'lahetetty' => $row['lahetetty'],
				'luettu' => $row['luettu'],
				));
		

        return $viestit;
        
        }

        return null;
	}

	public function save() {
  	$query = DB::connection()->prepare('INSERT INTO Viesti(lahettaja, vastaanottaja, aihe, sisalto, lahetetty, luettu) VALUES (:lahettaja, :vastaanottaja, :aihe, :sisalto, :lahetetty, :luettu) RETURNING id');
	$query->execute(array('lahettaja' => $this->lahettaja, 'vastaanottaja' => $this->vastaanottaja, 'aihe' => 
		 $this->aihe, 'sisalto' => $this->sisalto, 'lahetetty' => $this->lahetetty, 'luettu' => $this->luettu));

	$row = $query->fetch();

	$this->id = $row['id'];
	Kint::trace();
	Kint::dump($row);
	}
}