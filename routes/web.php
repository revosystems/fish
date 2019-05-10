<?php

    Auth::routes(['verify' => true]);

    Route::group(["middleware" => ['verified', 'user.active']], function () {
        Route::get('/', 'HomeController@index')->name("home");
        Route::get('/contact', 'ContactController@index')->name("contact");
        Route::get('/resources', 'ResourcesController@index')->name("resources");

        Route::any('/lead/typeSegmentsFetch', 'LeadController@fetchSegments')->name("lead.fetch");
        Route::post('/lead/typeSegmentsFetch', 'LeadController@fetchSegments')->name("lead.fetch");
        Route::resource("lead", 'LeadController');
        Route::get('/lead/{leadId}/download', 'LeadController@download')->name("lead.download");

        Route::get('/download/{folder}/{file}', 'DownloadsController@download');
        Route::get('/downloadDossier/{file}', 'DownloadsController@downloadDossier');
    });

    Route::group(["prefix" => 'admin', 'namespace' => "Admin", "middleware" => ['verified', 'user.active']], function () {
        Route::resource('leads', 'LeadsController', ["only" => ['show', 'update']])->middleware('can:see-lead,lead');
        Route::post('leads/{lead}/status', 'LeadsStatusController@store')->name('leads.status.store');
        //        Route::get('leads/{lead}/edit', 'LeadsController@edit')->name('leads.edit');
        Route::get('reports', 'ReportsController@index')->name('reports');
    });

Route::get('logout', "Auth\LoginController@logout")->name('logout');
