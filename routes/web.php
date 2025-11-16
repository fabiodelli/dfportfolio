<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Mail\NewLead;
use App\Models\Lead;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;




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

route::get('/mailable', function () {
    $lead = Lead::find(1);
    return new NewLead($lead);
});

Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Dashboard VECCHIA fuori dal gruppo: ELIMINIAMOLA
// Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

// Rotte protette admin
Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // dashboard: URL = /admin , nome = admin.dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // PROGETTI (come già avevi, ma senza /admin doppio)
        Route::resource('projects', ProjectController::class);

        // TECNOLOGIE
        Route::resource('technologies', TechnologyController::class);

        // TIPI
        Route::resource('types', TypeController::class);
    });


require __DIR__ . '/auth.php';
