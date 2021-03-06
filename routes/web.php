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

    Route::group(["middleware" => ['verified', 'user.active']], function () { // can = policy
        Route::resource('admin/leads', 'Admin\LeadsController', ["only" => ['show', 'update']]);
        Route::post('admin/leads/{lead}/status', 'Admin\LeadsStatusController@store')->name('leads.status.store');
        Route::get('admin/reports', 'Admin\ReportsController@index')->name('reports');
    });

    Route::get('logout', "Auth\LoginController@logout")->name('logout');

