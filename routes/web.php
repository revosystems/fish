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
        Route::post('leads/{lead}/comments', 'LeadCommentController@store')->name('leads.comments.store');
        Route::get('tasks/{task}/complete', 'TasksController@complete')->name('tasks.complete');

        Route::group(["prefix" => 'reports', "namespace" => "Reports"], function () { // can = policy
            Route::get('dashboard', 'DashboardController@index')->name('reports.dashboard');
            Route::get('leads', 'ReportsController@leads')->name('reports.leads');
            Route::get('export/csv/{type}', 'ReportsExporterController@csv');
            Route::get('export/xls/{type}', 'ReportsExporterController@xls');
        });
    });

    Route::get('logout', "Auth\LoginController@logout")->name('logout');

