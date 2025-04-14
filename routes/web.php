<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dmr\GestionDmrController;
use App\Http\Controllers\Dmr\ModelDmrController;
use App\Http\Controllers\Dmr\TypeDmrController;
use App\Http\Controllers\Elte\GestionElteController;
use App\Http\Controllers\Elte\ModelElteController;
use App\Http\Controllers\Tetra\GestionTetraController;
use App\Http\Controllers\Tetra\ModelTetraController;
use App\Http\Controllers\Tetra\TypeTetraController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [AuthController::class, 'register'])->name('auth.register');

Route::middleware('guest')->group(function () {
    Route::get('/connexion', [AuthController::class, 'create'])->name('auth.create');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.login');
    Route::post('/register/store', [AuthController::class, 'store'])->name('auth.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


    Route::get('/configuration/user', [ConfigurationController::class, 'userList'])->name('configuration.userList'); //retenu
    Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration.index'); //retenu
    Route::delete('/configuration/destroy/{id}', [ConfigurationController::class, 'destroy'])->name('configuration.destroy'); //retenu
    Route::get('/configuration/desactiver/{id}', [ConfigurationController::class, 'desactiverUser'])->name('configuration.desactiver'); //retenu
    Route::get('/configuration/activer/{id}', [ConfigurationController::class, 'activerUser'])->name('configuration.activer'); //retenu
    Route::put('/configuration/update/{id}', [ConfigurationController::class, 'update'])->name('configuration.update'); //retenu
    Route::get('/tetra', [TypeTetraController::class, 'index'])->name('type_tetra.index');
    Route::post('/type-tetra', [TypeTetraController::class, 'store'])->name('type-tetra.store');
    Route::put('/type-tetra/{typeTetra}', [TypeTetraController::class, 'update'])->name('type-tetra.update');
    Route::delete('/type-tetra/{typeTetra}', [TypeTetraController::class, 'destroy'])->name('type-tetra.destroy');

    Route::get('/gestion-dmr', [GestionDmrController::class, 'index'])->name('gestion_dmr.index');
    Route::get('/gestion-dmr/create', [GestionDmrController::class, 'create'])->name('gestion_dmr.create');
    Route::post('/dmrs', [GestionDmrController::class, 'store'])->name('gestionDmr.store');
    Route::get('/gestion-dmr/{id}/edit', [GestionDmrController::class, 'edit'])->name('gestion_dmr.edit');
    Route::put('/gestion-dmr/{id}', [GestionDmrController::class, 'update'])->name('gestion_dmr.update');
    Route::delete('/gestion-dmr/{id}', [GestionDmrController::class, 'destroy'])->name('gestion_dmr.destroy');
    Route::get('gestion-dmr/{id}', [GestionDmrController::class, 'show'])->name('gestion_dmr.show');


    Route::get('/gestion-elte', [GestionElteController::class, 'index'])->name('elte.index');
    Route::get('/gestion-elte/create', [GestionElteController::class, 'create'])->name('gestion_elte.create');
    Route::post('/eltes', [GestionElteController::class, 'store'])->name('gestionElte.store');
    Route::get('/gestion-elte/{id}/edit', [GestionElteController::class, 'edit'])->name('gestion_elte.edit');
    Route::put('/gestion-elte/{id}', [GestionElteController::class, 'update'])->name('gestion_elte.update');
    Route::delete('/gestion-elte/{id}', [GestionElteController::class, 'destroy'])->name('gestion_elte.destroy');
    Route::get('gestion-elte/{id}', [GestionElteController::class, 'show'])->name('gestion_elte.show');


    Route::get('/gestion-tetra', [GestionTetraController::class, 'index'])->name('gestion_tetra.index');
    Route::get('/gestion-tetra/create', [GestionTetraController::class, 'create'])->name('gestion_tetra.create');
    Route::post('/tetras', [GestionTetraController::class, 'store'])->name('gestionTetra.store');
    Route::get('gestion-tetra/{id}', [GestionTetraController::class, 'show'])->name('gestion_tetra.show');
    Route::get('gestion_tetra/{id}/edit', [GestionTetraController::class, 'edit'])->name('gestionTetra.edit');
    Route::put('gestion_tetra/{id}', [GestionTetraController::class, 'update'])->name('gestionTetra.update');
    Route::delete('gestion_tetra/{id}', [GestionTetraController::class, 'destroy'])->name('gestionTetra.destroy');

    Route::get('/tetra/model', [ModelTetraController::class, 'index'])->name('model_tetra.index');
    Route::post('/model-tetra', [ModelTetraController::class, 'store'])->name('model-tetra.store'); //retenu
    Route::put('/model-tetra/{modelTetra}', [ModelTetraController::class, 'update'])->name('model-tetra.update'); //retenu
    Route::delete('/model-tetra/{modelTetra}', [ModelTetraController::class, 'destroy'])->name('model-tetra.destroy'); //retenu

    Route::get('/model', [ModelDmrController::class, 'index'])->name('model_dmr.index');
    Route::post('/model-dmr', [ModelDmrController::class, 'store'])->name('model-dmr.store');
    Route::put('/model-dmr/{modelDmr}', [ModelDmrController::class, 'update'])->name('model-dmr.update');
    Route::delete('/model-dmr/{modelDmr}', [ModelDmrController::class, 'destroy'])->name('model-dmr.destroy');

    Route::get('/type/dmr', [TypeDmrController::class, 'index'])->name('type_dmr.index');
    Route::post('/type-dmr', [TypeDmrController::class, 'store'])->name('type-dmr.store');
    Route::put('/type-dmr/{typeDmr}', [TypeDmrController::class, 'update'])->name('type-dmr.update');
    Route::delete('/type-dmr/{typeDmr}', [TypeDmrController::class, 'destroy'])->name('type-dmr.destroy');

    Route::get('/model/elte', [ModelElteController::class, 'index'])->name('model_elte.index');
    Route::post('/model-elte', [ModelElteController::class, 'store'])->name('model-elte.store');
    Route::put('/model-elte/{modelElte}', [ModelElteController::class, 'update'])->name('model-elte.update');
    Route::delete('/model-elte/{modelElte}', [ModelElteController::class, 'destroy'])->name('model-elte.destroy');


    Route::get('/tetras/export', [GestionTetraController::class, 'export'])->name('tetras.export');
    Route::get('/eltes/export', [GestionElteController::class, 'export'])->name('eltes.export');
    Route::get('/dmrs/export', [GestionDmrController::class, 'export'])->name('dmrs.export');
});
