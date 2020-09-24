<?php

/*
[ ] Add the following line to your packages/eleganttechnologies/grok/routes/web.php file...... oh, there must be a more laravel-ish way
require_once(base_path('path to here/routes/web.php'));
*/


Route::get('/admin',fn()=>redirect('/admin/dashboard')); // Default to dashboard
Route::get('/admin/dashboard',function () {return view('tassy::layouts/admin');})->name('admin.dashboard');
