<?php

use App\Http\Controllers\Backend\ContactClientController;
use App\Http\Controllers\Backend\ConversationLogController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\LocationController;
use App\Http\Controllers\Backend\NonProspectiveClientController;
use App\Http\Controllers\Backend\OurClientController;
use App\Http\Controllers\Backend\PrimaryClientController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\WantedClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/project', [ProjectController::class, 'index'])->name('projectes');
Route::get('/project/create', [ProjectController::class, 'create'])->name('projectes.create');
Route::get('/project/getdata', [ProjectController::class, 'getdata'])->name('projectes.getdata');
Route::post('/project/store', [ProjectController::class, 'store'])->name('projectes.store');
Route::get('/project/edit/{id}', [ProjectController::class, 'edit'])->name('projectes.edit');
Route::put('/project/update/{id}', [ProjectController::class, 'update'])->name('projectes.update');
Route::delete('/project/distroy/{id}', [ProjectController::class, 'distroy'])->name('projectes.distroy');


Route::get('/primary-client', [CustomerController::class, 'index'])->name('primary-clients');
Route::get('/primary-client/create', [CustomerController::class, 'create'])->name('primary-clients.create');
Route::get('/primary-client/getdata', [CustomerController::class, 'getdata'])->name('primary-clients.getdata');
Route::post('/primary-client/store', [CustomerController::class, 'store'])->name('primary-clients.store');
Route::get('/primary-client/edit/{id}', [CustomerController::class, 'edit'])->name('primary-clients.edit');
Route::put('/primary-client/update/{id}', [CustomerController::class, 'update'])->name('primary-clients.update');
Route::delete('/primary-client/distroy/{id}', [CustomerController::class, 'distroy'])->name('primary-clients.distroy');

Route::get('/contact-client', [ContactClientController::class, 'index'])->name('contact-clients');
Route::get('/contact-client/getdata', [ContactClientController::class, 'getdata'])->name('contact-clients.getdata');
Route::post('/contact-client/store', [ContactClientController::class, 'store'])->name('contact-clients.store');
Route::get('/contact-client/edit/{id}', [ContactClientController::class, 'edit'])->name('contact-clients.edit');
Route::put('/contact-client/update/{id}', [ContactClientController::class, 'update'])->name('contact-clients.update');
Route::delete('/contact-client/distroy/{id}', [ContactClientController::class, 'distroy'])->name('contact-clients.distroy');

Route::get('/non-prospective-client', [NonProspectiveClientController::class, 'index'])->name('non-prospective-clients');
Route::get('/non-prospective-client/getdata', [NonProspectiveClientController::class, 'getdata'])->name('non-prospective-clients.getdata');
Route::post('/non-prospective-client/store', [NonProspectiveClientController::class, 'store'])->name('non-prospective-clients.store');
Route::get('/non-prospective-client/edit/{id}', [NonProspectiveClientController::class, 'edit'])->name('non-prospective-clients.edit');
Route::put('/non-prospective-client/update/{id}', [NonProspectiveClientController::class, 'update'])->name('non-prospective-clients.update');
Route::delete('/non-prospective-client/distroy/{id}', [NonProspectiveClientController::class, 'distroy'])->name('non-prospective-clients.distroy');

Route::get('/wanted-client', [WantedClientController::class, 'index'])->name('wanted-clients');
Route::get('/wanted-client/getdata', [WantedClientController::class, 'getdata'])->name('wanted-clients.getdata');
Route::post('/wanted-client/store', [WantedClientController::class, 'store'])->name('wanted-clients.store');
Route::get('/wanted-client/edit/{id}', [WantedClientController::class, 'edit'])->name('wanted-clients.edit');
Route::put('/wanted-client/update/{id}', [WantedClientController::class, 'update'])->name('wanted-clients.update');
Route::delete('/wanted-client/distroy/{id}', [WantedClientController::class, 'distroy'])->name('wanted-clients.distroy');

Route::get('/our-client', [OurClientController::class, 'index'])->name('our-clients');
Route::get('/our-client/getdata', [OurClientController::class, 'getdata'])->name('our-clients.getdata');
Route::post('/our-client/store', [OurClientController::class, 'store'])->name('our-clients.store');
Route::get('/our-client/edit/{id}', [OurClientController::class, 'edit'])->name('our-clients.edit');
Route::put('/our-client/update/{id}', [OurClientController::class, 'update'])->name('our-clients.update');
Route::delete('/our-client/distroy/{id}', [OurClientController::class, 'distroy'])->name('our-clients.distroy');

Route::post('/client/{id}/update-status', [CustomerController::class, 'updateStatus'])->name('client.updateStatus');

Route::get('/conversation-log', [ConversationLogController::class, 'index'])->name('conversation-logs');
Route::get('/conversation-log/create', [ConversationLogController::class, 'create'])->name('conversation-logs.create');
Route::get('/conversation-log/getdata', [ConversationLogController::class, 'getdata'])->name('conversation-logs.getdata');
Route::post('/conversation-log/store', [ConversationLogController::class, 'store'])->name('conversation-logs.store');
Route::get('/conversation-log/edit/{id}', [ConversationLogController::class, 'edit'])->name('conversation-logs.edit');
Route::put('/conversation-log/update/{id}', [ConversationLogController::class, 'update'])->name('conversation-logs.update');
Route::delete('/conversation-log/distroy/{id}', [ConversationLogController::class, 'distroy'])->name('conversation-logs.distroy');
Route::get('/assigned/project/{id}', [ConversationLogController::class, 'getAssignedProject'])->name('conversation-logs.getAssignedProject');
Route::get('/search/customers', [CustomerController::class, 'search'])->name('customers.search');

Route::get('/customers/search', [CustomerController::class, 'search'])->name('customers.search');


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