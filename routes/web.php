<?php

use App\Models\User;
use Illuminate\Support\Facades\DB;
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

    return User::query()
        ->first()
        ->posts()
        ->get();

//    return DB::table('users')
//        ->select('users.user_id', 'post_id')
//        ->join('posts', 'users.user_id', '=', 'posts.user_id')
//        ->get();
});
