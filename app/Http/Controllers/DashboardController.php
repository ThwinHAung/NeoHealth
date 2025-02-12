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
        if (!session()->has('patient')) {
            return redirect()->route('login'); // Redirect to register if no session
        }
    
        return view('patient.dashboard', ['patient' => session('patient')]);
    
    }
    public function makeAppointment(){
        return view('patient.booking');
    }

    public function showAppointmentHistory(){
        return view('patient.booking_history');
    }
    public function showPrescription(){
        return view('patient.prescription');
    }

    //Doctor
    public function showDoctorDashboard(){
        return view('doctor.dashboard');
    }

    public function showAppointmentHistoryAtDoctor(){
        return view('doctor.booking_history');
    }

    public function CreateWorkingSchedule(){
        return view('doctor.time_slot');
    }

    public function CreatePresctiption(){
        return view('doctor.medicine_prescription');
    }

}