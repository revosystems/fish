<?php

    Auth::routes(['verify' => true]);

    Route::group(["middleware" => ['verified', 'user.active']], function () {
        Route::get('/', 'HomeController@index')->name("home");
        Route::get('/contact', 'ContactController@index')->name("contact");
        Route::get('/resources', 'ResourcesController@index')->name("resources");

        Route::resource("lead", 'LeadController');
        Route::get('/lead/{leadId}/download', 'LeadController@download')->name("lead.download");

        Route::get('/download/{folder}/{file}', 'DownloadsController@download');
        Route::get('/downloadDossier/{file}', 'DownloadsController@downloadDossier');
    });

    Route::group(["prefix" => 'admin', "namespace" => "Admin", "middleware" => ['verified', 'user.active']], function () { // can = policy
        Route::resource('leads', 'LeadsController', ["only" => ['show', 'update']]);
        Route::get('leads/{lead}/showMore', 'LeadsController@showMore')->name('lead.showMore');
        Route::post('leads/{lead}/status', 'LeadsStatusController@store')->name('leads.status.store');
        Route::get('reports', 'ReportsController@index')->name('reports');
    });

    Route::get('logout', "Auth\LoginController@logout")->name('logout');

