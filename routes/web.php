<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Subscription\CreateEdit as SubscriptionCreateEdit;
use App\Livewire\Subscription\DataBackup;
use App\Livewire\Subscription\Index as SubscriptionIndex;
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

    Route::get('/subscriptions', SubscriptionIndex::class)->name('subscriptions.index');
    Route::get('/subscriptions/create', SubscriptionCreateEdit::class)->name('subscriptions.create');
    Route::get('/subscriptions/{id}/edit', SubscriptionCreateEdit::class)->name('subscriptions.edit');

    Route::get('/backup', DataBackup::class)->name('backup');
});

require __DIR__.'/auth.php';
