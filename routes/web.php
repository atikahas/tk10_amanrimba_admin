<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Bookings;
use App\Http\Livewire\BookingSummary;
use App\Http\Livewire\Inventory;
use App\Http\Livewire\Inventorykuali;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('booking', Bookings::class)->middleware('auth')->name('booking');
Route::get('booking/summary', BookingSummary::class)->middleware('auth')->name('booking.summary');
Route::get('inventory', Inventory::class)->middleware('auth')->name('inv');
Route::get('inventory/kuali', Inventorykuali::class)->middleware('auth')->name('inv.kuali');
