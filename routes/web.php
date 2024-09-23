<?php

use App\Http\Controllers\CheckedInDocumentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::post('/check-in', [CheckedInDocumentController::class, 'store'])
        ->name('check-in-doc.store');
});
