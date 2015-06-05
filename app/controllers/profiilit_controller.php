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

      $errors = $profiili->errors();
      Kint::dump($errors);

      if(count($errors) == 0)  {
        $profiili->save();
      } else {
        View::make('jasen/newprofiili.html', array('errors' => $errors, 'profiili' => $profiili));

      }

    //  Kint::dump($params);



      Redirect::to('/jasen/oma/' . $profiili->kayttajatunnus, array('message' => 'Käyttäjätununs luotu!'));

  }

  public static function newprofiili() {
    View::make('jasen/newprofiili.html');
  }

  public static function show($kayttajatunnus) {
    $profiili=Profiili::find($kayttajatunnus);
    View::make('jasen/show.html', array('profiili' => $profiili));
  }

  public static function oma($kayttajatunnus) {
    $profiili=Profiili::find($kayttajatunnus);
    View::make('jasen/oma.html', array('profiili' => $profiili));
  }

  public static function muokkaa($kayttajatunnus) {
    $profiili=Profiili::find($kayttajatunnus);
    Kint::dump($profiili);
    View::make('jasen/muokkaa.html', array('profiili' => $profiili));
  }

  public static function paivita($kayttajatunnus) {
    $params = $_POST;


    kint::dump($kayttajatunnus);
  
    kint::dump($params);

    $attributes = array(
        'kayttajatunnus' => $kayttajatunnus,
        'esittelyteksti' => $params['esittelyteksti'],
        'hakee' => $params['hakee'],
        'status' => $params['status']
        );

    $profiili = new Profiili($attributes);

    Kint::dump($profiili);



    $profiili->paivita();
    //errors

 //   Redirect::to('/jasen/oma/' . $profiili->kayttajatunnus, array('message' => 'Profiilin muokkaus onnistui loistavasti'));

    
  }

  public static function destroy($kayttajatunnus) {

    $profiili = new Profiili(array('kayttajatunnus' => $kayttajatunnus));

    $profiili->destroy();

    Redirect::to('/yvp', array('message' => 'Käyttäjätunnuksesi profiileineen on poistettu loistavasti!'));
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