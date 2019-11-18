<?php

Route::namespace('Omatech\Mage\Api\Controllers')
     ->group(function ($route) {
         $route->get('/test', 'TestController@testMethod')
               ->name('test.testMethod');
     });
