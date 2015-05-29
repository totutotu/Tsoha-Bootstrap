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

  $routes->get('/jasen/oma/:kayttajatunnus', function($kayttajatunnus) {
   ProfiilitController::saveedited($kayttajatunnus);
   ProfiilitController::oma($kayttajatunnus);
  }); 

  $routes->post('/jasen/newprofiili', function() {
    KayttajatController::store();
    ProfiilitController::newprofiili();    
  });

  $routes->get('/jasen/new', function() {
    KayttajatController::create();
  });

  $routes->get('/jasen/show/:kayttajatunnus', function($kayttajatunnus) {
   ProfiilitController::show($kayttajatunnus);
  });  

  $routes->get('/yhteisot', function() {
    YhteisotController::index();
  });

  $routes->get('/yhteisot/yhteisosivu/:id', function($id) {
   YhteisotController::show($id);
  });  

  $routes->get('/jasen/oma/:kayttajatunnus', function($kayttajatunnus) {
   ProfiilitController::oma($kayttajatunnus);
  });  

  $routes->get('/jasen/muokkaa/:kayttajatunnus', function($kayttajatunnus) {
   ProfiilitController::muokkaa($kayttajatunnus);
  });  

  $routes->get('/viestit/index/:kayttajatunnus', function($kayttajatunnus) {
   ViestitController::showviestit($kayttajatunnus);
  });  

  $routes->get('/viestit/nayta/:id', function($id) {
   ViestitController::showviesti($id);
  });  