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

    $user = User::create([
        'name' => 'mohamed',
        'email' => 'test@test.com',
        'email_verfied_at' => '2021-04-05 13:28:00',
        'password' => '123',
        'created_at' => '2021-04-05 13:28:00',
        'updated_at' => '2021-04-05 13:28:00'
    ]);
});

Route::get('/read', function () {
    $user = User::findOrFail(1);

    foreach ($user->roles as $role) {
        echo $role->name;
        echo '</br>';
    }
});


Route::get('/update', function () {
    $user = User::findOrFail(1);
    $user->name = 'ahmed';
    $user->save();
});

Route::get('/delete', function () {
    $user = User::findOrFail(1);
    $user->delete();
});


Route::get('/attach', function () {

    $user = User::findOrFail(2);
    $user->roles()->attach(3);

});
