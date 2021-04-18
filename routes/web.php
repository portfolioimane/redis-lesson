<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;
use App\Events\UserSignedUp;
//use App\Http\Middleware\Cors;

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


Route::get('/', function () {
    //$data = [
     //   'event' => 'UserSignedUp',
     //   'data' => [
     //       'username' => 'JohnDoe'
     //   ]
    //];
    //Redis::publish('test-channel', json_encode($data));
    event(new UserSignedUp('JohnDoe'));
    return view('welcome');
});//->middleware(Cors::class);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
