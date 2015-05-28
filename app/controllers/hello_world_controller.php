<?php
  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('home.html');
      }

    public static function sandbox(){
      $adonis = new Kayttaja(array('kayttajatunnus' => 'adonis', 'salasana' => 'fdsa'));

      $kayttaja = Kayttaja::find('adonis');
      $kayttajat = Kayttaja::all();
      Kint::dump($kayttaja);
      Kint::dump($kayttajat);
    }

    public static function login(){
      View::make('login.html');
    } 

    public static function uusijasen() {
      View::make('uusijasen.html');
    }
    
    public static function uusiviesti() {
      View::make('uusiviesti.html');
    }

    public static function muokkaa() {
      View::make('muokkaa.html');
    }

    public static function kayttajalista() {
      View::make('kayttajalista.html');
    }

   public static function julkprof() {
      View::make('julkprof.html');
    }

   public static function kotisivu() {
      View::make('kotisivu.html');
    }

     public static function yksitprof() {
      View::make('yksitprof.html');
    }
     
     public static function yhteiso() {
      View::make('yhteiso.html');
    }
     public static function viesti() {
      View::make('viesti.html');
    }
  }

