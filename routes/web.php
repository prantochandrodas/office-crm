<?php

use App\Http\Controllers\Backend\ConversationLogController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\LocationController;
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


Route::get('/conversation-log', [ConversationLogController::class, 'index'])->name('conversation-logs');
Route::get('/conversation-log/create', [ConversationLogController::class, 'create'])->name('conversation-logs.create');
Route::get('/conversation-log/getdata', [ConversationLogController::class, 'getdata'])->name('conversation-logs.getdata');
Route::post('/conversation-log/store', [ConversationLogController::class, 'store'])->name('conversation-logs.store');
Route::get('/conversation-log/edit/{id}', [ConversationLogController::class, 'edit'])->name('conversation-logs.edit');
Route::put('/conversation-log/update/{id}', [ConversationLogController::class, 'update'])->name('conversation-logs.update');
Route::delete('/conversation-log/distroy/{id}', [ConversationLogController::class, 'distroy'])->name('conversation-logs.distroy');
Route::get('/assigned/project/{id}', [ConversationLogController::class, 'getAssignedProject'])->name('conversation-logs.getAssignedProject');


Route::get('/division', [DivisionController::class, 'index'])->name('divisions');
Route::get('/division/create', [DivisionController::class, 'create'])->name('divisions.create');
Route::get('/division/getdata', [DivisionController::class, 'getdata'])->name('divisions.getdata');
Route::post('/division/store', [DivisionController::class, 'store'])->name('divisions.store');
Route::get('/division/edit/{id}', [DivisionController::class, 'edit'])->name('divisions.edit');
Route::put('/division/update/{id}', [DivisionController::class, 'update'])->name('divisions.update');
Route::delete('/division/distroy/{id}', [DivisionController::class, 'distroy'])->name('divisions.distroy');

Route::get('/location', [LocationController::class, 'index'])->name('locations');
Route::get('/location/create', [LocationController::class, 'create'])->name('locations.create');
Route::get('/location/getdata', [LocationController::class, 'getdata'])->name('locations.getdata');
Route::post('/location/store', [LocationController::class, 'store'])->name('locations.store');
Route::get('/location/edit/{id}', [LocationController::class, 'edit'])->name('locations.edit');
Route::put('/location/update/{id}', [LocationController::class, 'update'])->name('locations.update');
Route::delete('/location/distroy/{id}', [LocationController::class, 'distroy'])->name('locations.distroy');