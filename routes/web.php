<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Firebase\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('contacts', [ContactController::class, 'index'])->name('IndexContacts');
Route::get('create-contact', [ContactController::class, 'create'])->name('CreateContacts');
Route::post('store-contact', [ContactController::class, 'store'])->name('StoreContacts');
Route::get('edit-contact/{id}', [ContactController::class, 'edit'])->name('EditContacts');
Route::post('update-contact/{id}', [ContactController::class, 'update'])->name('UpdateContacts');
Route::post('delete-contact/{id}', [ContactController::class, 'destroy'])->name('DeleteContacts');

