<?php

class KayttajatController extends BaseController {
  public static function index() {

  	$profiilit = Profiili::all();

  	View::make('jasen/index.html', array('profiilit' => $profiilit));
  }

  public static function store() {

  	$params = $_POST;

  	$kayttaja = new Kayttaja(array(
  		'kayttajatunnus' => $params['kayttajatunnus'],
  		'salasana' => $params['kayttajatunnus']
  		));

  	$kayttaja->save();

    Kint::dump($params);

  }


  public static function create() {
      View::make('jasen/new.html');
  }

  public static function show($kayttajatunnus) {
    View::make('jasen/' . $kayttajatunnus);
  }
}