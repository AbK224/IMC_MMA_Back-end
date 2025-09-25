<?php
use App\Http\Controllers\Api\FighterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/fighters?',[FighterController::class,'index']);