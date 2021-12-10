<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubProductController;
use App\Http\Controllers\BillingDataController;
use App\Http\Controllers\FactureController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/connexion', function() {
    return view('sign-in');
})->name('connexion');

Route::get('/accueil', function() {
    return view('Accueil');
});

//client
Route::resource('client', ClientController::class);
Route::get('client/{client}/export',[ClientController::class,'exportClient'])->name('client.export');
Route::get('client/{client}/download', [ClientController::class,'downloadClient'])->name('client.download');

//product
Route::resource('produit',ProductController::class);
//subProduct
Route::resource('subProduct',SubProductController::class);
//Billing data
Route::resource('billingData',BillingDataController::class);
Route::get('billingData/{dataFacturation}/createFile',[BillingDataController::class,'createFile'])->name('data.createFile');
Route::post('billingData/{dataFacturation}/createFile',[BillingDataController::class,'storeFile'])->name('data.storeFile');
//e-facture
Route::resource('facture',FactureController::class);
Route::get('facture/{data}/generer',[FactureController::class,'genererFacture'])->name('facture.generer');

require __DIR__.'/auth.php';
