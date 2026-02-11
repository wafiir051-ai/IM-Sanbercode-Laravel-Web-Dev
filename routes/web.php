<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect()->route('category.index');
});

Route::resource('category', CategoryController::class);