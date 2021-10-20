<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\CuponDePagoController;
use App\Http\Controllers\ReintegroController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\PrestacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth'])->name('welcome');


Route::middleware(['administrador'])->group(function () {
    Route::get('/plan-management/create', [PlanController::class, 'create'])->name('plan.create');
    Route::post('/plan-store', [PlanController::class, 'store'])->name('plan.store');
    Route::get('/plan-management/update/{id}', [PlanController::class, 'update'])->name('plan.update');
    Route::patch('/plan-patch', [PlanController::class, 'patch'])->name('plan.patch');
    Route::get('/plan-management', [PlanController::class, 'getAll'])->name('plan.show');
});


Route::middleware(['empleado'])->group(function () {
    Route::get('/client-management/create', [ClienteController::class, 'create'])->name('client.create');
    Route::post('/client-store', [ClienteController::class, 'store'])->name('client.store');
    Route::get('/client-management/update/{id}', [ClienteController::class, 'update'])->name('client.update');
    Route::patch('/client-patch', [ClienteController::class, 'patch'])->name('client.patch');
    Route::get('/client-management/update-plan/{id}', [ClienteController::class, 'update_plan'])->name('client.update_plan');
    Route::patch('/client-patch-plan', [ClienteController::class, 'patch_plan'])->name('client.patch_plan');
    Route::get('/client-management', [ClienteController::class, 'getAll'])->name('client.show');
});

Route::get('/client-management/{id_titular}/family/add', [FamilyController::class, 'create'])->name('familiar.create');
Route::post('/familiar-store', [FamilyController::class, 'store'])->name('familiar.store');
Route::get('/client-management/{id_titular}/family', [FamilyController::class, 'getAll'])->name('family.list');
Route::get('/client-management/family/delete/{id_familiar}/{id_titular}', [FamilyController::class, 'delete'])->name('familiar.delete');

Route::get('/cupon/create', [CuponDePagoController::class, 'create'])->name('cupon.create');
Route::post('/cupon-store', [CuponDePagoController::class, 'store'])->name('cupon.store');
Route::get('/cupon-download/{forma}', [CuponDePagoController::class, 'downloadPDF'])->name('cupon.download');

Route::get('/reintegro/create', [ReintegroController::class, 'create'])->name('reintegro.create');
Route::post('/reintegro-store', [ReintegroController::class, 'store'])->name('reintegro.store');

Route::get('/prestacion/create', [PrestacionController::class, 'create'])->name('prestacion.create');
Route::post('/prestacion-store', [PrestacionController::class, 'store'])->name('prestacion.store');

Route::get('/benefits', [BenefitController::class, 'show'])->name('benefits.show');
Route::get('/benefits/add', [BenefitController::class, 'create'])->name('benefit.create');
Route::post('/benefit-store', [BenefitController::class, 'store'])->name('benefit.store');
Route::get('/benefits/delete/{id_benefit}', [BenefitController::class, 'delete'])->name('benefit.delete');

require __DIR__ . '/auth.php';
