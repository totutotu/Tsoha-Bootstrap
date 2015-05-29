<?php

Class YhteisotController extends BaseController {
  public static function index() {

  	$yhteisot = Yhteiso::all();

  	View::make('yhteisot/index.html', array('yhteisot' => $yhteisot));
  }


  public static function store() {
    $params= $_POST;

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