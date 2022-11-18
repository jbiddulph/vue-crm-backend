<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::middleware('auth:api')->group(function() {
         //All protected routes
         Route::controller(UserController::class)->group(function () {
            Route::get('user', 'index');
        });
        //Todos
        Route::controller(TodoController::class)->group(function () {
            Route::post('todo', 'store');
            Route::put('todo/{id}', 'update');
            Route::delete('todo/{id}', 'destroy');
        });
        //Items
        Route::controller(ItemController::class)->group(function () {
            Route::post('item', 'store');
            Route::put('item/{id}', 'update');
            Route::delete('item/{id}', 'destroy');
        });
        // Contacts
        Route::controller(ContactController::class)->group(function () {
            Route::get('contacts', 'index');
            Route::get('contact/{id}', 'show');
            Route::post('contact', 'store');
            Route::put('contact/{id}', 'update');
            Route::delete('contact/{id}', 'destroy');
        });
        // Notes
        Route::controller(NoteController::class)->group(function () {
            Route::get('notes', 'index');
            Route::get('note/{id}', 'show');
            Route::post('note', 'store');
            Route::put('note/{id}', 'update');
            Route::delete('note/{id}', 'destroy');
        });
        // Artworks
        Route::controller(ArtworkController::class)->group(function () {
            Route::post('artwork', 'store');
            Route::put('artwork/{id}', 'update');
            Route::delete('artwork/{id}', 'destroy');
        });
        // Companies
        Route::controller(CompanyController::class)->group(function () {
            Route::get('companies/all', 'allCompanies');
            Route::get('companies', 'index');
            Route::get('company/{id}', 'show');
            Route::get('company/{id}/contacts', 'allContacts');
            Route::post('company', 'store');
            Route::put('company/{id}', 'update');
            Route::delete('company/{id}', 'destroy');
        });
    });

    // All unprotected routes
    // Auth Login and Register
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::post('verify/{email}', 'verifyEmail');
    });
    // Todos
    Route::controller(TodoController::class)->group(function () {
        Route::get('todos', 'index');
        Route::get('todo/{id}', 'show');
    });
    // Items
    Route::controller(ItemController::class)->group(function () {
        Route::get('items', 'index');
        Route::get('item/{id}', 'show');
    });
    // Artworks
    Route::controller(ArtworkController::class)->group(function () {
        Route::get('artwork', 'index');
        Route::get('artwork/contact/{contact_id}', 'contactArtwork');
        Route::get('artwork/{id}', 'show');
    });
});
