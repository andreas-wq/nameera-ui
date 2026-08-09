<?php

use Illuminate\Support\Facades\Route;

Route::prefix('nameera')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('nameera::pages.dashboard');
    });

    // Auth pages (no sidebar/header)
    Route::get('/login', function () {
        return view('nameera::pages.login');
    });

    Route::get('/register', function () {
        return view('nameera::pages.register');
    });

    Route::get('/error-404', function () {
        return view('nameera::pages.error-404');
    });

    // Table pages
    Route::get('/table-basic', function () {
        return view('nameera::pages.table-basic');
    });

    Route::get('/table-special', function () {
        return view('nameera::pages.table-special');
    });

    Route::get('/table-custom', function () {
        return view('nameera::pages.table-custom');
    });

    Route::get('/table-custom-v2', function () {
        return view('nameera::pages.table-custom-v2');
    });

    // Component pages
    Route::get('/comp-base', function () {
        return view('nameera::pages.comp-base');
    });

    Route::get('/comp-nav', function () {
        return view('nameera::pages.comp-nav');
    });

    Route::get('/comp-feedback', function () {
        return view('nameera::pages.comp-feedback');
    });

    Route::get('/comp-data', function () {
        return view('nameera::pages.comp-data');
    });

    Route::get('/comp-advanced', function () {
        return view('nameera::pages.comp-advanced');
    });

    // Additional pages (if needed later)
    Route::get('/form-basic', function () {
        return view('nameera::pages.form-basic');
    });

    Route::get('/form-special', function () {
        return view('nameera::pages.form-special');
    });

    Route::get('/form-custom', function () {
        return view('nameera::pages.form-custom');
    });

    Route::get('/form-kit', function () {
        return view('nameera::pages.form-kit');
    });
});
