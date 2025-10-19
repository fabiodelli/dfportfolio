<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController;
use App\Mail\NewLead;
use App\Models\Lead;



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

Route::middleware(['auth','verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');
    // qui dovrebbe essere project e non projects
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'projects:slug']);
});

require __DIR__.'/auth.php';
