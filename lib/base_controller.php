<?php

  class BaseController{

    public static function get_user_logged_in(){
      if(isset($_SESSION['kayttaja'])) {
        $kayttaja_kayttajatunnus = $_SESSION['kayttaja'];

        $kayttaja = Kayttaja::find($kayttaja_kayttajatunnus);

        return $kayttaja;
      }

      return null;
    }

    public static function check_logged_in(){
      if(!isset($_SESSION['kayttaja'])) {
          Redirect::to('/login', array('message' => 'Kirjaudu ensin sisään!'));

      }
    }

  }
