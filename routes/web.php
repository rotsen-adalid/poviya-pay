<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/

Route::get('/', function () {
    return view('app-container');
})->name('home');

Route::get('/login', function () {
    return redirect()->route('home');
})->name('login');

Route::get('/register', function () {
    return redirect()->route('home');
})->name('register');

//------------------------------------------CYBERSOURCE----------------------------------------
/*
/*Route::put('/cybersource/receipt', [CyberSourceController::class, 'receipt'])
->name('cybersource/receipt'); 
*/

use App\Http\Controllers\CyberSourceController;
Route::post('/cybersource/receipt', [CyberSourceController::class, 'receipt'])
->name('cybersource/receipt'); 

Route::get('service/checkout/ys/f/{code_collection}/{lang}', 
function ($code_collection, $lang) {
    App::setLocale($lang);
    return view('app-container')->with(['code_collection' => $code_collection, 'lang' => $lang]);
})->name('service/checkout/ys/f');