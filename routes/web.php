<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// LOGIN
Route::get('/', [LoginController::class, 'show'])->name('show');
Route::get('/login', [LoginController::class, 'show'])->name('show');
Route::post('/check', [LoginController::class, 'check'])->name('check');
// REGISTER
Route::get('/Register', [LoginController::class, 'register'])->name('register');
Route::post('/Register', [LoginController::class, 'check_register'])->name('check_register');
// LOGOUT
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// DASHBOARD
Route::get('/dashboard', [ProjectController::class, 'index'])->middleware('auth')->name('dashboard');
// ADD PROJECT
Route::get('/dashboard/add-project', [ProjectController::class, 'showAdd'])->name('show-add-project');
Route::post('/add-project', [ProjectController::class, 'add'])->name('add-project');
// SHOW PROJECT
Route::get('/dashboard/show/{id}', [ProjectController::class, 'show'])->middleware('auth')->name('show-project');
// EDIT PROJECT
Route::get('/dashboard/{id}/edit-project', [ProjectController::class, 'showEdit'])->name('show-edit-project');
Route::post('/dashboard/{id}/edit-project', [ProjectController::class, 'edit'])->name('edit-project');
// DELETE PROJECT
Route::delete('/delete-project/{id}', [ProjectController::class, 'delete'])->name('delete-project');
// ========================================================
// TASKS
// -----------------------------------
Route::get('/dashboard/show/{id}/add', [ProjectController::class, 'addTask'])->name('show-add-task');
