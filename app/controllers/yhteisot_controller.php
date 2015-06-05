<?php

Class YhteisotController extends BaseController {
  public static function index() {

  	$yhteisot = Yhteiso::all();

  	View::make('yhteisot/index.html', array('yhteisot' => $yhteisot));
  }


  public static function store() {
    $params= $_POST;

    $yhteiso = new Yhteiso(array(
        'id' = $id;
        'nimi' => $params['nimi'],
        'yllapitaja' => $params['yllapitaja'],
        'esittely' => $params['esittely'],
        ));

      $errors  = $yhteiso->errors();


      if(count($errors) == 0)  {
        $yhteiso->save();
      } else {
        View::make('ythteisot/new.html', array('errors' => $errors, 'yhteiso' => $yhteiso));

      }

    Kint::dump($params);
  }

  public static function newyhteiso() {
    View::make('yhteisot/newyhteiso.html');
  }

  public static function show($id) {
    $yhteiso=Yhteiso::find($id);
    View::make('yhteisot/yhteisosivu.html', array('yhteiso' => $yhteiso));
  }
}