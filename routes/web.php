<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [CrudController::class, 'form_view'])->name('form');
Route::post('/form', [CrudController::class, 'insert'])->name('insert');
Route::get('/display', [CrudController::class, 'display'])->name('display');
Route::get('/edit/{id}', [CrudController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [CrudController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [CrudController::class, 'delete'])->name('delete');
