<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

//Admin
Route::get('/admin_dashboard',[DashboardController::class,'showDashboard'])->name('admin.dashboard');

Route::get('/admin_dashboard/user',[DashboardController::class,'user_table'])->name('admin.user');

//Patient
Route::get('/patient_dashboard',[DashboardController::class,'showPatientDashboard'])->name('patient.dashboard');

//Doctor 
Route::get('/doctor_dashboard',[DashboardController::class,'showDoctorDashboard'])->name('doctor.dashboard');