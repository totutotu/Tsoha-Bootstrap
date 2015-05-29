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

      $errors = $kayttaja->errors();

      Kint::dump($errors);

      if(count($errors) == 0)  {
        $kayttaja->save();
      } else {
        View::make('jasen/new.html', array('errors' => $errors, 'attributes' => $attributes));

      }

    Kint::dump($params);

  }

  public function validate_kayttajatunnus()  {
    $errors = array();
    if($this->kayttajatunnus == '' || $this->kayttajatunnus == null) {
      $erros[] = 'Kayttajatunnus ei saa olla tyhjä.';
    }
    if(strlen($this->kayttajatunnus < 6)) {
      $errors[] = 'Kayttajatunnuksen tulee olla vähintään 5 merkkiä.';
    }
    return $errors;
  }

  public function validate_salasana()  {
    $errors = array();
    if($this->kayttajatunnus == '' || $this->kayttajatunnus == null) {
      $erros[] = 'Salasana ei saa olla tyhjä.';
    }
    if(strlen($this->kayttajatunnus < 6)) {
      $errors[] = 'Salasanan tulee olla vähintään 5 merkkiä.';
    }
    return $errors;
  }

  public static function create() {
      View::make('jasen/new.html');
  }

  public static function newprofiili() {
    View::make('jasen/newprofiili.html');
  } 
}