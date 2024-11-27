<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ChatboxController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('ticket', TicketController::class);
    Route::get('/chatbox/{ticket_id}', [ChatboxController::class, 'show'])->name('chatbox.show');
    Route::patch('/chatbox/store', [ChatboxController::class, 'store'])->name('chatbox.store');
    Route::get('/ticket/show/{ticket}', [TicketController::class, 'show'])->name('ticket.show');
    Route::get('/ticket/assign/{ticket}', [TicketController::class, 'assign'])->name('ticket.assign');
});

require __DIR__.'/auth.php';
