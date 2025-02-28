<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Prescription;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use App\Http\Controllers\TimeSlotController;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::middleware('auth.check')->group(function () {
//Admin
Route::get('/admin/profile', [AdminController::class,'profile'])->name('admin.profile');
Route::put('/admin/update-profile', [AdminController::class, 'updateProfile'])->name('admin.update.profile');

Route::get('/admin_dashboard',[DashboardController::class,'showDashboard'])->name('admin.dashboard');

Route::get('/admin_dashboard/user_table',[PatientController::class,'show_patient_table'])->name('admin.patient');
Route::delete('/admin_dashboard/user_table/{patient}',[PatientController::class,'destroy'])->name('admin.patient.remove');
Route::get('/admin_dashboard/user_table/{patientId}', [PatientController::class, 'edit'])->name('admin.patient.edit');
Route::put('/admin_dashboard/user_table/{patientId}', [PatientController::class, 'updatePatient'])->name('admin.patient.update');


Route::get('/admin_dashboard/appointment_table',[DashboardController::class,'appointment_table'])->name('admin.appointment');
Route::get('/admin_dashboard/doctor_table',[DoctorController::class,'show_doctor_table'])->name('admin.doctor');
Route::post('/admin_dashboard/doctor_table',[DoctorController::class,'store'])->name('admin.storedoctor');
Route::delete('/admin_dashboard/doctor_table/{doctor}',[DoctorController::class,'destroy'])->name('admin.doctor.remove');
Route::get('/admin_dashboard/doctor_table/{doctorId}', [DoctorController::class, 'edit'])->name('admin.doctor.edit');
Route::put('/admin_dashboard/doctor_table/{doctorId}', [DoctorController::class, 'updateDoctor'])->name('admin.doctor.update');
Route::get('/admin_dashboard/doctor-slots', [TimeSlotController::class, 'getDoctorAvailableSlots'])
    ->name('admin.getDoctorAvailableSlots');
Route::put('/admin_dashboard/book-appointment/{appointment}', [DashboardController::class, 'updateAppointment'])
    ->name('admin.bookAppointment');

//Patient
Route::get('/patient/profile', [PatientController::class,'profile'])->name('patient.profile');
Route::put('/patient/update-profile', [PatientController::class, 'updateProfile'])->name('patient.update.profile');
Route::get('/patient_dashboard',[DashboardController::class,'showPatientDashboard'])->name('patient.dashboard');
Route::get('/patient_dashboard/booking',[DashboardController::class,'makeAppointment'])->name('patient.booking');
Route::get('/patient_dashboard/prescription',[DashboardController::class,'showPrescription'])->name('patient.prescription');
Route::get('/patient_dashboard/prescription/{id}',[DashboardController::class,'prescriptionDetail'])->name('patient.prescriptionDetail');
Route::get('/patient_dashboard/appointment_history',[DashboardController::class,'showAppointmentHistory'])->name('patient.appointment_history');
Route::get('/patient_dashboard/get-available-slots', [TimeSlotController::class, 'getAvailableSlots'])->name('patient.getAvailableSlots');
Route::get('/get-doctors-by-specialty', [DashboardController::class, 'getDoctorsBySpecialty'])->name('get-doctors-by-specialty');
Route::post('/patient/book-appointment', [TimeSlotController::class, 'bookAppointment'])->name('patient.bookAppointment');
Route::put('/patient/book-appointment', [TimeSlotController::class, 'changeAppointment'])->name('patient.bookAppointment');
Route::get('/patient/searchAppointments', [DashboardController::class, 'searchAppointment'])->name('patient.searchAppointments');
// Route::get('/patient/bookinghistory', [TimeSlotController::class, 'bookingHistory'])->name('patient.bookingHistory');
Route::put('/appointments/{id}/cancel', [TimeSlotController::class, 'cancel'])->name('patient.cancelAppointment');




//Doctor 
Route::get('/doctor_dashboard/profile',[DoctorController::class,'profile'])->name('doctor.profile');
Route::put('/doctor_dashboard/update-profile',[DoctorController::class,'updateProfile'])->name('doctor.update.profile');
Route::get('/doctor_dashboard',[DashboardController::class,'showDoctorDashboard'])->name('doctor.dashboard');
Route::get('/doctor_dashboard/appointment_history',[DashboardController::class,'showAppointmentHistoryAtDoctor'])->name('doctor.appointment_history');
Route::get('/doctor_dashboard/working_schedule',[DashboardController::class,'CreateWorkingSchedule'])->name('doctor.working_schedule');

Route::get('/doctor_dashboard/create_prescription',[Prescription::class,'CreatePrescription'])->name('doctor.prescription');
Route::post('/doctor_dashboard/store_prescription', [Prescription::class, 'storePrescription'])->name('doctor.store_prescription');
Route::post('/timeslot/store', [TimeSlotController::class, 'store'])->name('timeslot.store');
Route::delete('/timeslot/{id}', [TimeSlotController::class, 'destroy'])->name('timeslot.destroy');
Route::post('/appointments/{id}/update-status', [DoctorController::class, 'updateStatus'])->name('doctor.updateStatus');
Route::delete('/appointments/{id}/cancel', [DoctorController::class, 'cancelAppointment'])
    ->name('doctor.cancelAppointment');
Route::get('/appointments/{id}', [DoctorController::class, 'showAppointmentDetails']);




});

