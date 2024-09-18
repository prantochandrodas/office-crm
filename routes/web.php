<?php

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
