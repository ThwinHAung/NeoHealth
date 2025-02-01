<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Admin
    public function showDashboard(){
        return view('admin.dashboard');
    }

    public function user_table(){
        return view('admin.user_table');
    }
    public function appointment_table(){
        return view('admin.appointment_table');
    }

    public function doctor_table(){
        return view('admin.doctor_table');
    }

    //Patient
    public function showPatientDashboard(){
        return view('patient.dashboard');
    }

    public function showAppointmentHistory(){
        return view('patient.booking_history');
    }

    //Doctor
    public function showDoctorDashboard(){
        return view('doctor.dashboard');
    }

    public function showAppointmentHistoryAtDoctor(){
        return view('doctor.booking_history');
    }

}