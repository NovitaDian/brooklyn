<?php

use App\Http\Controllers\Admin\UnitAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteplanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::get('siteplan', [SiteplanController::class, 'index'])->name('siteplan.index');
    Route::post('siteplan', [SiteplanController::class, 'store']);
    Route::put('siteplan/{id}', [SiteplanController::class, 'update']);
    Route::delete('siteplan/{id}', [SiteplanController::class, 'destroy']);

    Route::resource('faq', FaqController::class)->except(['show']);
});
Route::get('/unit/{id}', [UnitAdminController::class, 'show'])->name('unit.detail');

require __DIR__ . '/auth.php';
