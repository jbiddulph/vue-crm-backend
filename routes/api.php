<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'index');
});

//Todos
Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
});

//Items
Route::controller(ItemController::class)->group(function () {
    Route::get('items', 'index');
    Route::post('item', 'store');
    Route::get('item/{id}', 'show');
    Route::put('item/{id}', 'update');
    Route::delete('item/{id}', 'destroy');
});

// Contacts
Route::controller(ContactController::class)->group(function () {
    Route::get('contacts', 'index');
    Route::post('contact', 'store');
    Route::get('contact/{id}', 'show');
    Route::put('contact/{id}', 'update');
    Route::delete('contact/{id}', 'destroy');
});

// Companies
Route::controller(CompanyController::class)->group(function () {
    Route::get('companies/all', 'allCompanies');
    Route::get('companies', 'index');
    Route::post('company', 'store');
    Route::get('company/{id}', 'show');
    Route::get('company/{id}/contacts', 'allContacts');
    Route::put('company/{id}', 'update');
    Route::delete('company/{id}', 'destroy');
});
