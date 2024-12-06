<?php

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

use App\Http\Controllers\AboutController;
use App\Http\Controllers\TextController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/about', [AboutController::class, 'show']);

Route::get('/', [TextController::class, 'index'])->name('home');
Route::post('/store', [TextController::class, 'store'])->name('store');

Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/texts', [TextController::class, 'index'])->name('texts.index');
Route::post('/texts', [TextController::class, 'store'])->name('texts.store');
Route::get('/texts/{text}/edit', [TextController::class, 'edit'])->name('texts.edit');
Route::put('/texts/{text}', [TextController::class, 'update'])->name('texts.update');
Route::delete('/texts/{text}', [TextController::class, 'destroy'])->name('texts.destroy');



Route::get('/check-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return response()->json(['status' => 'success', 'message' => 'Database connection is OK']);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => 'Could not connect to the database. Please check your configuration.']);
    }
});
