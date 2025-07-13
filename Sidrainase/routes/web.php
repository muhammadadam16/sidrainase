<?php

use App\Http\Controllers\SaluranDrainaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Models\SaluranDrainase;
use App\Http\Controllers\FrontController;

Route::get('/', function () {
    return view('welcome');
})->name('front.welcome');

//front
Route::get('/kontak', function () {
    return view('front.kontak');
})->name('kontak');
Route::get('/tentangkami', function () {
    return view('front.tentangkami');
})->name('tentangkami');
Route::get('/peta', [FrontController::class, 'peta'])->name('peta');

route::middleware('isLogin')->group(function(){
    //login
route::get('login',[AuthController::class,'login'])-> name('login');
route::post('login',[AuthController::class,'loginProses'])-> name('loginProses');
});

//LogOut
route::get('logout',[AuthController::class,'logout'])-> name('logout');

route::middleware('checkLogin')->group(function(){
    // dashboard
route::get('dashboard',[DashboardController::class,'index'])-> name('dashboard');
//saluran drainase
route::get('salurandrainase',[SaluranDrainaseController::class,'index'])-> name('salurandrainase');
route::get('salurandrainase/create',[SaluranDrainaseController::class,'create'])-> name('salurandrainaseCreate');
route::post('salurandrainase/store',[SaluranDrainaseController::class,'store'])-> name('salurandrainaseStore');
route::get('salurandrainase/edit/{id}',[SaluranDrainaseController::class,'edit'])-> name('salurandrainaseEdit');
route::post('salurandrainase/update/{id}',[SaluranDrainaseController::class,'update'])-> name('salurandrainaseUpdate');
route::delete('salurandrainase/destroy/{id}',[SaluranDrainaseController::class,'destroy'])-> name('salurandrainaseDestroy');
route::get('salurandrainase/excel}',[SaluranDrainaseController::class,'excel'])-> name('salurandrainaseExcel');
route::get('salurandrainase/Pdf}',[SaluranDrainaseController::class,'Pdf'])-> name('salurandrainasePdf');


route::middleware('isAdmin')->group(function(){
    //pegawai
route::get('pegawai',[UserController::class,'index'])-> name('pegawai');
route::get('pegawai/create',[UserController::class,'create'])-> name('pegawaiCreate');
route::post('pegawai/store',[UserController::class,'store'])-> name('pegawaiStore');
route::get('pegawai/edit/{id}',[UserController::class,'edit'])-> name('pegawaiEdit');
route::post('pegawai/update/{id}',[UserController::class,'update'])-> name('pegawaiUpdate');
route::delete('pegawai/destroy/{id}',[UserController::class,'destroy'])-> name('pegawaiDestroy');
route::get('pegawai/excel}',[UserController::class,'excel'])-> name('pegawaiExcel');
route::get('pegawai/Pdf}',[UserController::class,'Pdf'])-> name('pegawaiPdf');
});
});
// API GeoJSON saluran drainase
Route::get('/geojson/salurandrainase', [SaluranDrainaseController::class, 'geojson'])->name('geojson.saluran');