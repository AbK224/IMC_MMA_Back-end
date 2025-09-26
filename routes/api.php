<?php
use App\Http\Controllers\Api\FighterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
Route::get('/fighters',[FighterController::class,'index']);
Route::post('/fighter',[FighterController::class,'store']);
=======

Route::post('/fighter',[FighterController::class,'store']);
Route::delete('/fighter/{id}',[FighterController::class,'destroy']);
Route::get('/fighters/report/summary',[FighterController::class,'summary']);


>>>>>>> 7419a4785714930d870132f78c2569d18c04377b
