<?php

use Illuminate\Support\Facades\Route;

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
    for ($i = 10; $i >= 0; $i--) {
        sleep(1); // To delay by one second per iteration.
        dispatch(new \App\Jobs\CountdownBroadcaster($i))->onQueue('countdown');
    }
    return view('welcome');
});
