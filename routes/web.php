<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Profile\AvatarController;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\TicketController;
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

Route::get('/openai', function () {
    /*Check The "Curl error: SSL certificate problem: unable to get local issuer certificate" Error
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/completions");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    if ($output === false) {
        echo 'Curl error: ' . curl_error($ch);
    } else {
        echo 'Operation completed without any errors';
    }
    curl_close($ch);
    */    

    // $result = OpenAI::completions()->create([
    //     'model' => 'text-davinci-003',
    //     'prompt' => 'Once upon a time',
    // ]);
    // echo $result->choices[0]->text;

    $result = OpenAI::images()->create([
        'prompt' => 'A Cute Baby Sea Otter',
        "n" => 2,
        "size" => "1024x1024",
    ]);
    echo $result . "<br>";
});

Route::post('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user = User::updateOrCreate(['email' => $user->email], [
    //     'name' => $user->name,
    //     'email' => $user->email,
    //     'avatar' => $user->avatar,
    //     'password' => bcrypt('password'),
    // ]);
    
    $user = User::firstOrCreate(['email' => $user->email], [
        'name' => $user->name,
        'email' => $user->email,
        'avatar' => $user->avatar,
        'password' => bcrypt('password'),
    ]);
    Auth::login($user, true);
    return redirect('/dashboard');

});

Route::middleware('auth')->prefix('ticket')->group(function() {
    Route::resource('/', TicketController::class);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
