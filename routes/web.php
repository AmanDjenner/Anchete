<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('divisions', DivisionController::class);
// routes/web.php


Route::get('/divisions', [DivisionController::class, 'index'])->name('divisions.index');
Route::get('/divisions/create', [DivisionController::class, 'create'])->name('divisions.create');
Route::post('/divisions', [DivisionController::class, 'store'])->name('divisions.store');
Route::resource('users', UserController::class);
Route::resource('roles', RolesController::class);
// Route::get('roles/{roles}', [RolesController::class, 'show'])->name('roles.show');
Route::get('roles/{roles}', [RolesController::class, 'show'])->name('roles.show');
Route::get('roles/{roles}/edit', [RolesController::class, 'edit'])->name('roles.edit');
// Vizualizare permisiuni rol
Route::get('roles/{role}/permissions', [RolesController::class, 'permissions'])->name('roles.permissions');

// Actualizare permisiuni rol
Route::put('roles/{role}/permissions', [RolesController::class, 'updatePermissions'])->name('roles.updatePermissions');


Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');


Route::resource('permissions', PermissionController::class);
Route::resource('institutions', InstitutionController::class);
Route::post('permissions/bulk-update', [PermissionController::class, 'bulkUpdate'])->name('permissions.bulkUpdate');
Route::post('roles/{role}/update-permissions', [RolesController::class, 'updatePermissions'])->name('roles.update-permissions');
Route::resource('users', UserController::class);
