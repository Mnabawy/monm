<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});


Route::get('/create', function () {

    $user = User::find(1);
    $role = new Role(['name' => 'user']);

    $user->roles()->save($role);
});

Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        echo $role->name;
        echo '</br>';
    }
});


Route::get('/update' ,function(){
    $user = User::findOrFail(1);
    $user->name = 'ahmed';
    $user->save();
});

Route::get('/delete', function (){
    $user = User::findOrFail(1);
    $user->delete();
});