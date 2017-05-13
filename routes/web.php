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

use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/insert', function(){
    
    $user = User::findOrFail(1);
    
    $address = new Address(['name' => 'Hospital Road, Maijdee']);
    
    
    $user->address()->save($address);
});


Route::get('/update', function(){
    
   //$address = Address::where('user_id', 1)->get(); 
    
   $address = Address::whereUserId(1)->first(); 
    
    $address->name = "Updated, Noakhali";
    
    $address->save();
    
});


Route::get('/read', function(){
    
    $user = User::findOrFail(1);
    
    echo $user->address->name;
    
    
});


Route::get('/delete', function(){
    
    $user = User::findOrFail(1);
    
    $user->address()->delete();
    
    return "Done!";
    
    
});









