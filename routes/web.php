<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCandidateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminApplicationController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserProfileController;
use App\Events\RecruitmentFinished;


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
    return view('homepage');
});

Auth::routes();



Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/profiles', function () {
    return view('profiles');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/school-history', function () {
    return view('school-history');
})->name('school-history');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin-panel', function () {
        return view('admin.admin-dashboard');
    })->name('admin.dashboard');

    // Routing dla tabeli users
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');


    // Routing dla tabeli profiles
    Route::get('/admin/profiles', [AdminProfileController::class, 'index'])->name('admin.profiles.index');
    Route::get('/admin/profiles/{id}', [AdminProfileController::class, 'show'])->name('admin.profiles.show');
    Route::get('admin/profiles/create', [AdminProfileController::class, 'create'])->name('admin.profiles.create');
    Route::post('/admin/profiles', [AdminProfileController::class, 'store'])->name('admin.profiles.store');
    Route::get('/admin/profiles/{id}/edit', [AdminProfileController::class, 'edit'])->name('admin.profiles.edit');
    Route::put('/admin/profiles/{id}', [AdminProfileController::class, 'update'])->name('admin.profiles.update');
    Route::delete('/admin/profiles/{id}', [AdminProfileController::class, 'destroy'])->name('admin.profiles.destroy');

    Route::post('/admin/recruitment/refresh', function () {
        // Wywołanie eventu RecruitmentFinished
        event(new RecruitmentFinished());

        // Przekierowanie na odpowiednią stronę lub wykonanie innych działań
        return redirect()->back()->with('success', 'Rekrutacja została odświeżona.');
    })->name('admin.recruitment.refresh');

    // Routing dla tabeli applications
    Route::get('/admin/applications', [AdminApplicationController::class, 'index'])->name('admin.applications.index');
    Route::get('/admin/applications/{id}', [AdminApplicationController::class, 'show'])->name('admin.applications.show');
    Route::get('/admin/applications/create', [AdminApplicationController::class, 'create'])->name('admin.applications.create');
    Route::post('/admin/applications', [AdminApplicationController::class, 'store'])->name('admin.applications.store');
    Route::get('/admin/applications/{id}/edit', [AdminApplicationController::class, 'edit'])->name('admin.applications.edit');
    Route::put('/admin/applications/{id}', [AdminApplicationController::class, 'update'])->name('admin.applications.update');
    Route::delete('/admin/applications/{id}', [AdminApplicationController::class, 'destroy'])->name('admin.applications.destroy');
});





Route::get('/home/{name}', function ($name) {
    return view('home')->with('name', $name);
})->name('home');

Route::get('/admin', function () {
    return redirect('/');
})->name('admin.home');


Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles');
Route::get('/users', [UserController::class, 'index'])->name('users');


Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('updateProfile');


Route::get('user-profile', [UserProfileController::class, 'index'])->name('user-profile');
Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [UserProfileController::class, 'update'])->name('profile.update');




Route::post('/apply/{profileId}', [ApplicationController::class, 'apply'])->name('apply');
