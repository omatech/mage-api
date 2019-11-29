<?php

Route::namespace('Omatech\Mage\Api\Controllers')
     ->middleware(['api'])
     ->group(function ($route) {
         $route->namespace('Auth')
              ->group(function ($auth) {
                  $auth->post('/login', 'LoginController@login')
                       ->name('auth.login');
              });
     });
