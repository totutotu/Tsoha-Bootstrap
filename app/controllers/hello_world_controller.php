<?php

  class HelloWorldController extends BaseController{

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('home.html');
      }

    public static function sandbox(){
      // Testaa koodiasi täällä
      View::make('helloworld.html');
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
  }

