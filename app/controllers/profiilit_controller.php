<?php

Class ProfiilitController extends BaseController {
  public static function index() {

  	$profiilit = Profiili::all();

  	View::make('jasen/index.html', array('profiilit' => $profiilit));
  }


  public static function store() {
    $params= $_POST;

      $profiili = new Profiili(array(
        'kayttajatunnus' => $params['kayttajatunnus'],
        'etunimi' => $params['etunimi'],
        'sukunimi' => $params['sukunimi'],
        'ika' => $params['ika'],
        'sukupuoli' => $params['sukupuoli'],
        'esittelyteksti' => $params['esittelyteksti'],
        'hakee' => $params['hakee'],
        'status' => $params['status']
        ));

      $profiili->save();

      Kint::dump($params);

      // Redirect::to('/jasen/' . $kayttaja->kayttajatunnus, array('message' => 'Käyttäjätununs luotu!'));

  }

  public static function newprofiili() {
    View::make('jasen/newprofiili.html');
  }

  public static function show($kayttajatunnus) {
    View::make('jasen/' . $kayttajatunnus);
  }
}