<?php

use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/project', [ProjectController::class, 'index'])->name('projectes');
Route::get('/project/create', [ProjectController::class, 'create'])->name('projectes.create');
Route::get('/project/getdata', [ProjectController::class, 'getdata'])->name('projectes.getdata');
Route::post('/project/store', [ProjectController::class, 'store'])->name('projectes.store');
Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('projectes.edit');
Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('projectes.update');
Route::delete('/project/distroy/{id}', [ProjectController::class, 'distroy'])->name('projectes.distroy');


Route::get('/customer', [CustomerController::class, 'index'])->name('customers');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customers.create');
Route::get('/customer/getdata', [CustomerController::class, 'getdata'])->name('customers.getdata');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
Route::put('/customer/update/{id}', [CustomerController::class, 'update'])->name('customers.update');
Route::delete('/customer/distroy/{id}', [CustomerController::class, 'distroy'])->name('customers.distroy');
