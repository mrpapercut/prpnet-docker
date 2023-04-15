<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PRPNetController;

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

// Route::get('/', function () {
//     return view('app');
// });

Route::get('/', [PRPNetController::class, 'serverStats'])->name('serverStats');
// Route::get('/server_stats', [PRPNetController::class, 'serverStats'])->name('serverStats');
Route::get('/pending_tests', [PRPNetController::class, 'pendingTests'])->name('pendingTests');
// Route::get('/user_stats', [PRPNetController::class, 'userStats'])->name('userStats');
// Route::get('/user_primes', [PRPNetController::class, 'userPrimes'])->name('userPrimes');
// Route::get('/team_stats', [PRPNetController::class, 'teamStats'])->name('teamStats');
// Route::get('/team_primes', [PRPNetController::class, 'teamPrimes'])->name('teamPrimes');

Route::get('/recent_results', [PRPNetController::class, 'recentResults'])->name('recentResults');
Route::get('/stats', [PRPNetController::class, 'statistics'])->name('statistics');

// Route::get('/admin/group/{form}', [AdminController::class, 'groupDetails'])->name('admin:groupDetails');
Route::post('/admin/group/export', [AdminController::class, 'exportGroup'])->name('admin:exportGroup');
Route::view('/admin/group/addrange', 'admin.addRange')->name('admin:addRangePage');
Route::post('/admin/group/addrange', [AdminController::class, 'addRange'])->name('admin:addRange');
