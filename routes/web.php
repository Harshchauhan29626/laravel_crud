<?php

use App\Http\Controllers\CrudItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('crud-items.index'));
Route::resource('crud-items', CrudItemController::class);
