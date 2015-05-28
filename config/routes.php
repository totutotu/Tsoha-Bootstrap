<?php

  $routes->get('/', function() {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

  $routes->get('/login', function() {
  	HelloWorldController::login();
  });

  $routes->get('/uusijasen', function() {
  	HelloWorldController::uusijasen();
  });

  $routes->get('/uusiviesti', function() {
    HelloWorldController::uusiviesti();
  });

  $routes->get('/muokkaa', function() {
    HelloWorldController::muokkaa();
  });

  $routes->get('/julkprof', function() {
    HelloWorldController::julkprof();
  });
  
  $routes->get('/kotisivu', function() {
    HelloWorldController::kotisivu();
  });

  $routes->get('/yksitprof', function() {
    HelloWorldController::yksitprof();
  });

  $routes->get('/yhteiso', function() {
    HelloWorldController::yhteiso();
  });

  $routes->get('/viesti', function() {
    HelloWorldController::viesti();
  });

  $routes->get('/jasen', function() {
    ProfiilitController::index();
   });

 $routes->post('/jasen', function() {
    ProfiilitController::store();
    ProfiilitController::index();
   });

  $routes->post('/jasen/newprofiili', function() {
    KayttajatController::store();
    ProfiilitController::newprofiili();
  });

  $routes->get('/jasen/new', function() {
    KayttajatController::create();
  });

  $routes->get('/jasen/:kayttajatunnus', function($kayttajatunnus) {
   ProfiilitController::show($kayttajatunnus);
  });  