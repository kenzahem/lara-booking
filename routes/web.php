<?php

Route::livewire('/', 'pages::users.index');

Route::livewire('/booking', 'pages::frontend.booking');

Route::livewire('/admin', 'pages::backend.home');
Route::livewire('/admin/bookings', 'pages::backend.booking');
