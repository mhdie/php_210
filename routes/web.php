<?php

Route::get('/',function (){
    return 'hi';
});
//Route::match(['get','post'],'/',function (){
//    return view('home');
//});
Route::match(['get','post'],'/products', function () {
    return view('product');});
Route::match(['get','post'],'/products{id}', function () {
    return view('product');
});

Route::match(['get','post'],'/login',function (){
    return view('login');
});

Route::match(['get','post'],'/signup',function (){
    return view('signup');
});

Route::match(['get','post'],'/shoppingbasket{id}',function (){
    return view('shoppingbasket');
});
Route::match(['get','post'],'/user{id}',function (){
    return view('user');
});

