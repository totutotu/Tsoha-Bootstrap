<?php
class UserController extends BaseController{
  public static function login(){
      View::make('yvp/login.html');
  }
  public static function handle_login(){
    $params = $_POST;

    $kayttaja = Kayttaja::authenticate($params['kayttajatunnus'], $params['salasana']);

    if(!$kayttaja){
      View::make('yvp/login.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'kayttajatunnus' => $params['kayttajatunnus']));
    }else{
      $_SESSION['kayttaja'] = $kayttaja->kayttajatunnus;

      Redirect::to('/jasen', array('message' => 'Tervetuloa takaisin ' . $user->name . '!'));
    }
  }
}