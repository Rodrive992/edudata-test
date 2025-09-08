<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrespuestoEduGralController;
use App\Http\Controllers\EduRedController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SolicitudesEduRedController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\AdministracionEjecucionController;
use App\Http\Controllers\InnovacionController;
use App\Http\Controllers\AsuntosController;
use App\Http\Controllers\ProgramasProyectosController;
use App\Http\Controllers\TitulosController;
use App\Http\Controllers\EducacionTecnicaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

// Página principal - Acceso Publico
Route::get('/', function () {
    return view('edudata.index');
})->name('edudata.index');
// Url Edured - Acceso Publico
Route::get('/edured', [AuthController::class, 'showLoginForm'])->name('login');

// Secciones de EduData - Acceso Publico
Route::prefix('edudata')->group(function () {
    Route::get('/asuntos', [AsuntosController::class, 'index'])->name('edudata.asuntos');
    Route::get('/mantenimiento', [MantenimientoController::class, 'index'])->name('edudata.mantenimiento');
    Route::get('/formacion', [FormacionController::class, 'index'])->name('edudata.formacion');
    Route::get('/edutecnica', [EducacionTecnicaController::class, 'index'])->name('edudata.edutecnica');
    Route::get('/innovacion', [InnovacionController::class, 'index'])->name('edudata.innovacion');
    Route::get('/titulos', [TitulosController::class, 'index'])->name('edudata.titulos');
    Route::get('/programasyproyectos', [ProgramasProyectosController::class, 'index'])->name('edudata.programas');
    
});

// Autenticación manual
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Secciones de EduRed con autenticación obligatoria
Route::prefix('edured')->middleware('auth')->group(function () {    
    Route::get('/', [EduRedController::class, 'index'])->name('edured.index');    
    Route::get('/historial', [EduRedController::class, 'solicitudes'])->name('edured.historial');
    Route::post('/generar-solicitud-edilicio', [SolicitudesEduRedController::class, 'nuevaSolicitudEdilicio'])->name('edured.generar-solicitud-edilicio');   
    Route::post('/generar-solicitud-vacante', [SolicitudesEduRedController::class, 'nuevaSolicitudVacante'])->name('edured.generar-solicitud-vacante');
});

    