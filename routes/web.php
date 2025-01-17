<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Profile\AvatarController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('home');
});

Route::post('/register', [StudentController::class, 'store'])->name('register');
Route::post('make-reg', [StudentController::class, 'makereg'])->name('make-reg');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
    $user = User::firstOrCreate(['email' => $user->email], [
        'name' => $user->name,
        'password' => bcrypt('password'),
    ]);
    Auth::login($user);
    return redirect('/dashboard');
});

Route::middleware('auth')->group(function () {
    Route::resource('/ticket', TicketController::class);
});


Route::get('login/github', [LoginController::class, 'redirectToGitHub'])->name('login.github');
Route::get('login/github/callback', [LoginController::class, 'handleGitHubCallback']);