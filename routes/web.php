<?php

	Auth::routes(['verify' => true]);

	//Route::middleware(['verified', 'user.active'])->group(function () {
		Route::get('/', 'HomeController@index')->middleware("verified")->middleware("user.active")->name("home");
        Route::get('/contact', 'ContactController@index')->middleware("verified")->middleware("user.active")->name("contact");
        Route::get('/resources', 'ResourcesController@index')->middleware("verified")->middleware("user.active")->name("resources");

		Route::any('/lead/typeSegmentsFetch', 'LeadController@fetchSegments')->middleware("verified")->middleware("user.active")->name("lead.fetch");
		Route::post('/lead/typeSegmentsFetch', 'LeadController@fetchSegments')->middleware("verified")->middleware("user.active")->name("lead.fetch");
		Route::resource("lead", 'LeadController')->middleware(['auth','verified']);
        Route::get('/lead/{leadId}/download', 'LeadController@download')->middleware("verified")->middleware("user.active")->name("lead.download");

        Route::get('/download/{folder}/{file}', 'DownloadsController@download');

        Route::resource('admin/leads', 'Admin\LeadsController', ["only" => ['show', 'update']]);
        Route::post('admin/leads/{lead}/status', 'Admin\LeadsStatusController@store')->name('leads.status.store');
//        Route::get('admin/leads/{lead}/edit', 'Admin\LeadsController@edit')->name('leads.edit');
        Route::get('admin/reports', 'Admin\ReportsController@index')->name('reports');
	//});
Route::get('logout', "Auth\LoginController@logout");

