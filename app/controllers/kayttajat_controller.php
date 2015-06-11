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
        View::make('jasen/new.html', array('errors' => $errors, 'kayttaja' => $kayttaja));

      }
  }

  public static function create() {
      View::make('jasen/new.html');
  }

  public static function newprofiili() {
    View::make('jasen/newprofiili.html');
  } 

  public static function login(){
      View::make('yvp/login.html');
  }
  public static function handle_login(){
    $params = $_POST;


    $kayttaja = Kayttaja::authenticate($params['kayttajatunnus'], $params['salasana']);

    if(!$kayttaja){
      View::make('login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'kayttajatunnus' => $params['kayttajatunnus']));
    }else{
      $_SESSION['kayttaja'] = $kayttaja->kayttajatunnus;

      Redirect::to('/jasen', array('message' => 'Tervetuloa takaisin ' . $kayttaja->kayttajatunnus . '!'));
    }
  }

    public static function logout() {
    $_SESSION['kayttaja'] = null;
    Redirect::to('/login', array('message' => 'Olet kirjautunut ulos!'));
  }

}