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

  $routes->get('/kayttajalista', function() {
    HelloWorldController::kayttajalista();
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

  