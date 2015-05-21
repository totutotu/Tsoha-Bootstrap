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