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

  $routes->get('/viestit/new', function() {
    ViestitController::newViesti();
  });

  $routes->get('/yhteisot/new', function() {
    YhteisotController::newyhteiso();
  });

  $routes->get('/yhteisot', function() {
    YhteisotController::index();
  });

  $routes->post('/yhteisot', function() {
    YhteisotController::store();
    YhteisotController::index();
    
  });

  $routes->get('/jasen', function() {
    ProfiilitController::index();
   });

 $routes->post('/jasen', function() {
    ProfiilitController::store();
    ProfiilitController::index();
   });

  $routes->post('/jasen/oma/:kayttajatunnus', function($kayttajatunnus) {
   ProfiilitController::paivita($kayttajatunnus);
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

  $routes->get('/yhteisot/yhteisosivu/:id', function($id) {
   YhteisotController::show($id);
  });  

  $routes->get('/jasen/oma/:kayttajatunnus', function($kayttajatunnus) {
   ProfiilitController::oma($kayttajatunnus);
  });  

  $routes->post('/jasen/:kayttajatunnus/destroy', function($kayttajatunnus){
  ProfiilitController::destroy($kayttajatunnus);
  });

  $routes->get('/jasen/muokkaa/:kayttajatunnus', function($kayttajatunnus) {
   ProfiilitController::muokkaa($kayttajatunnus);
  });

  $routes->post('/jasen/muokkaa/:kayttajatunnus', function($kayttajatunnus) {
   ProfiilitController::paivita($kayttajatunnus);
   ProfiilitController::oma($kayttajatunnus);

  });

  $routes->get('/viestit/index/:kayttajatunnus', function($kayttajatunnus) {
   ViestitController::showviestit($kayttajatunnus);
  });  

  $routes->get('/viestit/nayta/:id', function($id) {
   ViestitController::showviesti($id);
  });  

  $routes->get('/login', function(){
  KayttajatController::login();
});

$routes->post('/login', function(){
  KayttajatController::handle_login();
});

$routes->post('/logout', function(){
  KayttajatController::logout();
});