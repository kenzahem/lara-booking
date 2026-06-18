<?php

use App\Http\Middleware\AuthUser;

// Route::livewire('/', 'pages::users.index');



Route::livewire('/booking', 'pages::frontend.booking');
Route::livewire('/login', 'pages::auth.login');

//ADMIN BACKEND
Route::middleware(AuthUser::class)->group(function(){
    Route::livewire('/', 'pages::backend.home');
    Route::livewire('/admin', 'pages::backend.home');
    Route::livewire('/admin', 'pages::backend.home');
    Route::livewire('/admin/bookings', 'pages::backend.booking');
    Route::livewire('/admin/create-booking', 'pages::backend.create-booking');
});
