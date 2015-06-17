<?php

Class ProfiilitController extends BaseController {
  public static function index() {
    self::check_logged_in();


  	$profiilit = Profiili::all();

  	View::make('jasen/index.html', array('profiilit' => $profiilit));
  }

  public static function store() {
    self::check_logged_in();

    $params= $_POST;

      $profiili = new Profiili(array(
        'kayttajatunnus' => $_SESSION['kayttaja'],
        'etunimi' => $params['etunimi'],
        'sukunimi' => $params['sukunimi'],
        'ika' => $params['ika'],
        'sukupuoli' => $params['sukupuoli'],
        'esittelyteksti' => $params['esittelyteksti'],
        'hakee' => $params['hakee'],
        'status' => $params['status']
        ));

      $errors = $profiili->errors();
      Kint::dump($errors);

      if(count($errors) == 0)  {
        $profiili->save();
      } else {
        View::make('jasen/newprofiili.html', array('errors' => $errors, 'profiili' => $profiili));

      }

      Redirect::to('/jasen/oma/' . $profiili->kayttajatunnus, array('message' => 'Käyttäjätununs luotu!'));

  }

  public static function newprofiili() {
    self::check_logged_in();


    View::make('jasen/newprofiili.html');
  }

  public static function show($kayttajatunnus) {
    self::check_logged_in();

    $profiili=Profiili::find($kayttajatunnus);
    View::make('jasen/show.html', array('profiili' => $profiili));
  }

  public static function oma($kayttajatunnus) {
    self::check_logged_in();

    $profiili=Profiili::find($kayttajatunnus);
    View::make('jasen/oma.html', array('profiili' => $profiili));
  }

  public static function muokkaa($kayttajatunnus) {
    self::check_logged_in();

    $profiili=Profiili::find($kayttajatunnus);
    Kint::dump($profiili);
    View::make('jasen/muokkaa.html', array('profiili' => $profiili));
  }

  public static function paivita($kayttajatunnus) {
    self::check_logged_in();

    $params = $_POST;

    $paivitettava = Profiili::find($_SESSION['kayttaja']);

    $attributes = array(            
        'kayttajatunnus' => $paivitettava->kayttajatunnus,
        'etunimi' => $paivitettava->etunimi,
        'sukunimi' => $paivitettava->sukunimi,
        'ika' => $paivitettava->ika,
        'sukupuoli' => $paivitettava->sukupuoli,
        'esittelyteksti' => $params['esittelyteksti'],
        'hakee' => $params['hakee'],
        'status' => $params['status']);

    $profiili = new Profiili($attributes);

    $profiili->paivita();

  Redirect::to('/jasen/oma/' . $paivitettava->kayttajatunnus, array('message' => 'Profiilin muokkaus onnistui loistavasti'));

    
  }

  public static function destroy($kayttajatunnus) {
    self::check_logged_in();

    $profiili = new Profiili(array('kayttajatunnus' => $kayttajatunnus));
    
    $profiili->destroy();
  }


  public function validate_ika()  {
    $errors = array();
    if(!is_numeric($this->ika)) {
      $errors[] = 'Syötä ikä väliltä 5-90';
    }  else if($this->ika == null) {
      $errors[] = 'Syötä ikä.';
    } else if($this->ika < 5 || $this->ika > 90 ) {
      $errors[] = 'Syötä ikä väliltä 5-90';
    }

    return $errors;
  }

}