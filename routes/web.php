<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
   return redirect()->route('dashboard');
})->name('home');

//Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get("/dashboard", \App\Livewire\App\Dashboard::class)->name("dashboard");

    Route::get("/laws", \App\Livewire\App\LawOverview::class)->name("laws");
    Route::get("/law-create", \App\Livewire\App\LawCreate::class)->name("law-create");
    Route::get("/law/{law}", \App\Livewire\App\LawEditor::class)->name("law");
    Route::get("/allegations", \App\Livewire\App\Allegations::class)->name("allegations");
    Route::get("/allegation-create/{lawid}", \App\Livewire\App\AllegationCreate::class)->name("allegation-create");
    Route::get("/allegation/{allegation}", \App\Livewire\App\AllegationEditor::class)->name("allegation");
    Route::get("/configurations", \App\Livewire\App\ConfigurationEditor::class)->name("configurations");
    Route::get("/legal_fields", \App\Livewire\App\LegalFieldOverview::class)->name("legal-fields");

    Route::get("/catalogue", [\App\Http\Controllers\PDF::class, "generate"])->name("catalogue");
    Route::get("/export", [\App\Http\Controllers\ExportController::class, "exportCSV"])->name("export");


    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Route::get("/admin/users", \App\Livewire\App\Admin\UserManager::class)
        ->middleware("password.confirm")
        ->name("admin.users");

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
