<?php

use App\Http\Controllers\Admin\ComputerController;
use App\Http\Controllers\Admin\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;

Route::get('',[HomeController::class, 'index'])->middleware('auth');
Route::get('',[UserController::class,'index'])->name('admin.users.index');
Route::resource('employees',EmployeeController::class)->names('admin.employees');
Route::resource('computers',ComputerController::class)->names('admin.computers');