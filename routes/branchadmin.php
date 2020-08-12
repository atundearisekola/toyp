<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('branchadmin')->user();

    //dd($users);

    return view('branchadmin.home');
})->name('home');



