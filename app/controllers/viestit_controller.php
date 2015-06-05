<?php

Class ViestitController extends BaseController {
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

      $errors  = $viesti->errors();


      if(count($errors) == 0)  {
        $viesti->save();
      } else {
        View::make('viestit/new.html', array('errors' => $errors, 'viesti' => $viesti));

      }
      // Redirect::to('/jasen));

  }

  public static function newViesti() {
    View::make('uusiviesti.html');
  }

  public static function showviestit($kayttajatunnus) {
    $viestit=Viesti::findall($kayttajatunnus);
    View::make('viestit/index.html', array('viestit' => $viestit));
  }

  public static function showviesti($id) {
    $viesti=Viesti::find($id);
    View::make('viestit/nayta.html', array('viesti' => $viesti));
  }
}