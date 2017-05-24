<?php

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

use App\Address;
use App\User;

Route ::get('/', function () {
    return view('welcome');
});

Route ::get('/insert', function () {

    $user = User ::findOrFail(1);
    $address = new Address(['name' => '1234 houson ave']);
    $user -> address() -> save($address);
});

Route ::get('/update',function (){
//    $address = Address::where('user_id','=',1);
//    $address = Address::whereUserId(1);
    $address = Address::where('user_id',1)->first();
    $address->name="Updated new Address";
    $address->save();
});

Route ::get('/read', function (){

    $user = User::findOrFail(1);
    echo $user->address->name;

});

Route ::get('/delete', function (){

    $user = User::findOrFail(1);
     $user->address()->delete();
    return 'deleted';
});