<?php

Class ViestitController extends BaseController {
  public static function talleta() {
    $params= $_POST;

      $viesti = new Viesti(array(
        'lahettaja' => $_SESSION['kayttaja'],
        'vastaanottaja' => $params['vastaanottaja'],
        'aihe' => $params['aihe'],
        'sisalto' => $params['sisalto'],
        ));

      $errors  = $viesti->errors();


      if(count($errors) == 0)  {
        $viesti->save();
      } else {
        View::make('viestit/new.html', array('errors' => $errors, 'viesti' => $viesti));

      }

    //  Redirect::to('/viestit/index/' . $viesti->lahettaja, array('message' => 'Viesti lähetetty!'));

  }

  public static function newViesti() {
    View::make('viestit/new.html');
  }

  public static function showviestit($kayttajatunnus) {
    $viestit=Viesti::findall($kayttajatunnus);
    View::make('viestit/index.html', array('viestit' => $viestit));
  }

  public static function showviesti($id) {
    $viesti=Viesti::find($id);
    View::make('viestit/nayta.html', array('viesti' => $viesti));
  }

  public static function destroy($kayttajatunnus) {
    self::check_logged_in();

    $viesti = new Viesti(array('lahettaja' => $kayttajatunnus));

    $viesti->destroy();

  }

}