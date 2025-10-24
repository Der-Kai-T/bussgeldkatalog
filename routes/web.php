<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
   return redirect()->route('dashboard');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get("/laws", \App\Livewire\App\LawOverview::class)->name("laws");
    Route::get("/law/{law}", \App\Livewire\App\LawEditor::class)->name("law");
    Route::get("/allegations", \App\Livewire\App\Allegations::class)->name("allegations");
    Route::get("/allegation/{allegation}", \App\Livewire\App\AllegationEditor::class)->name("allegation");
    Route::get("/configurations", \App\Livewire\App\ConfigurationEditor::class)->name("configurations");

    Route::get("/catalogue", [\App\Http\Controllers\PDF::class, "generate"])->name("catalogue");


    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';
