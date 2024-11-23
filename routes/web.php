<?php

use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faktury', [InvoicesController::class, 'index'] )->name('invoices.index');
Route::get('/faktury/dodaj', [InvoicesController::class, 'create'] )->name('invoices.create');
Route::get('/faktury/edytuj/{id}', [InvoicesController::class, 'edit'] )->name('invoices.edit');
Route::post('/faktury/zapisz', [InvoicesController::class, 'store'] )->name('invoices.store');
Route::put('/faktury/zmien/{id}', [InvoicesController::class, 'update'] )->name('invoices.update');
Route::delete('/faktury/usun/{id}', [InvoicesController::class, 'delete'] )->name('invoices.delete');

Route::resource('klienci', CustomersController::class, ['names'=>'customers']);
