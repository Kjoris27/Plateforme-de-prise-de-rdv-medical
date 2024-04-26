<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\patientController;


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

// Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/view-doctors', [PatientController::class, 'viewDoctors'])->name('admin.viewDoctors');
    Route::get('/admin/view-nurses', [PatientController::class, 'viewNurses'])->name('admin.viewNurses');
    Route::get('/admin/view-patients', [PatientController::class, 'viewPatients'])->name('admin.viewPatients');
    Route::get('/admin/add-doctor', [PatientController::class, 'showAddDoctorForm'])->name('admin.showAddDoctorForm');
    Route::post('/admin/add-doctor', [PatientController::class, 'addDoctor'])->name('admin.addDoctor');
    Route::get('/admin/add-nurse', [PatientController::class, 'showAddNurseForm'])->name('admin.showAddNurseForm');
    Route::post('/admin/add-nurse', [PatientController::class, 'addNurse'])->name('admin.addNurse');
    


});


// Cashier Routes List

Route::middleware(['auth', 'user-access:cashier'])->group(function () {
    Route::get('/cashier/home', [PatientController::class, 'cashierHome'])->name('cashier'); // Afficher la liste des patients
    Route::get('/patient/validate-payment/{id}', [PatientController::class, 'showPaymentValidationForm'])->name('patient.validatePaymentForm');
    Route::post('/patient/complete-payment/{id}', [PatientController::class, 'completePayment'])->name('patient.completePayment');

});



Route::middleware(['auth', 'user-access:nurse'])->group(function () {
    Route::get('/nurse/home', [HomeController::class, 'nurse'])->name('nurse.home');
});


// Doctor Routes List
Route::middleware(['auth', 'user-access:doctor'])->group(function () {
    Route::get('/doctor/home', [HomeController::class, 'doctor'])->name('doctor.home');
    Route::get('/doctor/appointments/{id}/prescribe', [PatientController::class, 'prescribeForm'])->name('appointment.prescribe');
    Route::post('/doctor/appointments/{id}/prescribe', [PatientController::class, 'prescribeTreatment'])->name('appointment.prescription');
    Route::get('/doctor/appointments/prescriptions', [PatientController::class, 'prescriptionsList'])->name('doctor.prescriptions');


});


Route::get('/patient/create', [patientController::class, 'create'])->name('create');
Route::post('/patient/store', [patientController::class, 'store'])->name('store');
Route::get('/patient/{id}', [PatientController::class, 'show'])->name('view');
Route::delete('/patients/{id}', [PatientController::class, 'destroy'])->name('delete');
Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('edit');
Route::put('/patients/{id}', [PatientController::class, 'update'])->name('update');
Route::get('/patient/{id}/assign-doctor', [PatientController::class, 'assignDoctorForm'])->name('assign.doctor');
Route::get('/patient/{id}/print-ticket', [PatientController::class, 'printTicket'])->name('printTicket');
Route::get('/doctor/appointments', [PatientController::class, 'showDoctorAppointments'])->name('doctor.appointments');










