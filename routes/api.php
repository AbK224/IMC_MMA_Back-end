<?php
use App\Http\Controllers\Api\FighterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/fighters',[FighterController::class,'index']);
Route::post('/fighter',[FighterController::class,'store']);
Route::delete('/fighter/{id}',[FighterController::class,'destroy']);
Route::get('/fighters/report/summary',[FighterController::class,'summary']);
Route::get('/fighters/{id}/greeting',[FighterController::class,'greeting']);

