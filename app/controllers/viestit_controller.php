<?php

Class ViestitController extends BaseController {
  public static function index($tunnus) {

 $query = DB::connection()->prepare('SELECT * FROM viesti WHERE kayttajatunnus = :tunnus');
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
  


  public static function store() {
    $params= $_POST;

      $viesti = new Viesti(array(
        'lahettaja' => $params['lahettaja'],
        'vastaanottaja' => $params['vastaanottaja'],
        'aihe' => $params['aihe'],
        'sisalto' => $params['sisalto'],
        'lahetetty' => $params['lahetetty'],
        'luettu' => $params['luettu'],
        ));

      $viesti->save();

      Kint::dump($params);

      // Redirect::to('/jasen/' . $kayttaja->kayttajatunnus, array('message' => 'Käyttäjätununs luotu!'));

  }

  public static function newViesti() {
    View::make('uusiviesti.html');
  }

  public static function showViestit($kayttajatunnus) {
    View::make('jasen/viestit' . $kayttajatunnus);
  }
}