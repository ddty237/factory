<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubProductController;
use App\Http\Controllers\BillingDataController;
use App\Http\Controllers\RecoveryController;

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
Route::resource('client', ClientController::class)->middleware(['auth']);
//Route::get('client/{client}/export',[ClientController::class,'exportClient'])->middleware(['auth'])->name('client.export');
Route::get('client/{client}/download', [ClientController::class,'downloadClient'])->middleware(['auth'])->name('client.download');

//client import and export
Route::get('export/client',[ClientController::class,'export'])->middleware(['auth'])->name('client.export');

Route::get('import/client',[ClientController::class,'showImport'])->middleware(['auth'])->name('client.import');
Route::post('import/client',[ClientController::class,'import'])->middleware(['auth'])->name('client.import');

//product
Route::resource('produit',ProductController::class)->middleware(['auth']);
//subProduct
Route::resource('subProduct',SubProductController::class)->middleware(['auth']);
//Billing data
Route::resource('billingData',BillingDataController::class)->middleware(['auth']);
Route::get('billingData/{dataFacturation}/createFile',[BillingDataController::class,'createFile'])->middleware(['auth'])->name('data.createFile');
Route::post('billingData/{dataFacturation}/createFile',[BillingDataController::class,'storeFile'])->middleware(['auth'])->name('data.storeFile');
//e-facture
Route::resource('facture',FactureController::class)->middleware(['auth']);
Route::get('facture/{data}/generer',[FactureController::class,'genererFacture'])->middleware(['auth'])->name('facture.generer');
Route::get('facture/{data}/export',[FactureController::class,'exportFacture'])->middleware(['auth'])->name('facture.export');
Route::get('facture/{data}/download',[FactureController::class,'downloadFacture'])->middleware(['auth'])->name('facture.download');
//recouvrement
Route::resource('recovery',RecoveryController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
