<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();


      foreach($this->validators as $validator){
          $errors = array_merge($errors, $this::$validator());
      }
      Kint::dump($errors);
      return $errors;
    }

    public function validate_string_length($sana, $pituus, $muuttuja) {
      $errors = array();
    
      if($sana == '' || $sana == null){
        $errors[] = $muuttuja . ' syöte puuttuu.';
      } else if(strlen($sana) < $pituus){
        $errors[] = $muuttuja . ' pituuden tulee olla vähintään ' . $pituus . ' merkkiä!';
    }
        Kint::dump($errors);
    return $errors;
    }

    public function validate_string_length_max($sana, $maxpituus, $muuttuja) {
      $errors = array();
       
      if(strlen($sana) > $maxpituus){
        $errors[] = $muuttuja . ' pituuden tulee olla enintään ' . $maxpituus . ' merkkiä!';
    }

    Kint::dump($errors);
    return $errors;
    }
  }
