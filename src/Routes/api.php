<?php

use Illuminate\Support\Facades\Route;
use SajadDev\CodeJudge\Http\Controllers\ArbitrationController;
use SajadDev\CodeJudge\Http\Controllers\ParticipantsController;
use SajadDev\CodeJudge\Http\Controllers\QuestionsController;

Route::prefix('api')->group(function () {
    Route::apiResource('questions', QuestionsController::class);
    Route::apiResource('arbitration', ArbitrationController::class);
    Route::apiResource('participants', ParticipantsController::class);
});
