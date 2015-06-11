<?php

Class YhteisotController extends BaseController {
  public static function index() {
    self::check_logged_in();


  	$yhteisot = Yhteiso::all();

  	View::make('yhteisot/index.html', array('yhteisot' => $yhteisot));
  }


  public static function store() {
    self::check_logged_in();

    $params= $_POST;
    $yllapitaja = $_SESSION['kayttaja'];

    $yhteiso = new Yhteiso(array(
        'nimi' => $params['nimi'],
        'yllapitaja' => $yllapitaja,
        'esittely' => $params['esittely'],
        ));

      $errors  = $yhteiso->errors();


      if(count($errors) == 0)  {
        $yhteiso->save();
      } else {
        View::make('yhteisot/new.html', array('errors' => $errors, 'yhteiso' => $yhteiso));

      }

    Kint::dump($params);
  }

  public static function newyhteiso() {
    self::check_logged_in();

    View::make('yhteisot/new.html');
  }

  public static function show($id) {
    self::check_logged_in();

    $yhteiso=Yhteiso::find($id);
    View::make('yhteisot/yhteisosivu.html', array('yhteiso' => $yhteiso));
  }
}