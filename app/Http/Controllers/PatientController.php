<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Prescription;
use Illuminate\Support\Facades\Hash;







class PatientController extends Controller
{
    // Méthode pour afficher la vue de création de patient
    public function create()
{
    $nurse = Auth::user();
    $doctors = User::where('role', 'doctor')->get(); // Ajout de cette ligne pour récupérer la liste des docteurs
    return view('patient.create', compact('nurse', 'doctors')); // Passer la liste des docteurs à la vue
}


public function store(Request $request)
{
    // Validez les données du formulaire
    $validatedData = $request->validate([
        'lastname' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'age' => 'required|integer',
        'birthday' => 'required|date',
        'sexe' => 'required|string',
        'telephone' => 'nullable|string|max:255',
        'occupation' => 'required|string|max:255',
        'temperature' => 'required|numeric|min:35|max:50',
        'weight' => 'required|numeric|min:1',
        'taille' => 'nullable|string|regex:/^\d{1,2}m\d{1,2}$/',
        'tension' => 'nullable|string|max:255',
        'observation' => 'nullable|string',
        'nurse_id' => 'required|integer',
        'doctor_id' => 'required|integer',
    ]);


    // Générez un code de consultation unique
    $consultationCode = Str::random(8); // Vous pouvez ajuster la longueur du code si nécessaire

    // Ajoutez le code de consultation aux données validées
    $validatedData['consultation_code'] = $consultationCode;

    // Créez le nouveau patient en utilisant les données validées du formulaire
    Patient::create($validatedData);

    return redirect()->route('nurse.home')->with('success', 'Patient added successfully');
}



public function showDoctorAppointments()
{
    $doctorName = Auth::user()->name;
    $doctorPatients = Patient::whereHas('doctor', function ($query) use ($doctorName) {
        $query->where('name', $doctorName);
    })->get();

    return view('doctor.appointments', compact('doctorPatients'));
}


public function prescribeForm($id)
{
    $patient = Patient::findOrFail($id);
    return view('prescribe', compact('patient'));
}

public function prescribeTreatment(Request $request, $id)
{
    $patient = Patient::findOrFail($id);

    // Valider et enregistrer les informations de prescription dans la base de données
    $validatedData = $request->validate([
        'disease' => 'required|string',
        'allergy' => 'required|string',
        'prescription' => 'required|string',
    ]);

    // Créer et associer une nouvelle prescription au patient
    $prescription = new Prescription($validatedData);
    $patient->prescriptions()->save($prescription);

    return redirect()->route('doctor.appointments')->with('success', 'Prescription added successfully');
}



public function prescriptionsList()
{
    $doctorId = Auth::user()->id;
    $doctorPatients = Patient::where('doctor_id', $doctorId)
        ->select('id', 'firstname', 'lastname', 'disease', 'allergy', 'prescription')
        ->get();

    // dd($doctorPatients);

    return view('doctor.prescriptions', compact('doctorPatients'));
}

public function prescriptions()
{
    return $this->hasMany(Prescription::class);
}


    public function cashierHome()
    {
        $patients = Patient::select('id', 'lastname', 'firstname', 'consultation_code')->get();
        // dd($patients);

        return view('cashier', compact('patients'));
    }

    public function validatePayment($id)
    {
        $patient = Patient::findOrFail($id);

        // Code pour valider le paiement (à implémenter)

        return redirect()->route('cashier')->with('success', 'Payment validated successfully');
    }

    public function showPaymentValidationForm($id)
{
    $patient = Patient::findOrFail($id);
    return view('validate-payment', compact('patient'));
}

    public function completePayment(Request $request, $id)
{
    $patient = Patient::findOrFail($id);

    $paymentOption = $request->payment_option;


    $confirmationMessage = "Le paiement pour {$patient->firstname} {$patient->lastname} a été validé avec l'option de paiement : $paymentOption";


    return redirect()->route('cashier')->with('payment_success', true)
                                     ->with('payment_confirmation', $confirmationMessage);

}



public function viewDoctors()
{
    $doctors = User::where('role', 'doctor')->get();

    return view('admin.view-doctors', compact('doctors'));
}



public function viewNurses()
{
    $nurses = User::where('role', 'nurse')->get();

    return view('admin.view-nurses', compact('nurses'));
}



public function viewPatients()
{
    $patients = Patient::all();

    return view('admin.view-patients', compact('patients'));
}


public function showAddDoctorForm()
    {
        return view('admin.add-doctor-form');
    }

    public function addDoctor(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:doctor',
        ]);

        // Créer une nouvelle infirmière dans la base de données
        $doctor = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'],
        ]);

        $doctor->type = 4;
        $doctor->save();

        return redirect()->route('admin.viewDoctors')->with('success', 'Doctor created successfully');

    }


    public function showAddNurseForm()
    {
        return view('admin.add-nurse-form');
    }

    public function addNurse(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8',
        'role' => 'required|string|in:nurse',
    ]);

    $nurse = new User([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'role' => $validatedData['role'],
    ]);

    $nurse->type = 3;
    $nurse->save();

    return redirect()->route('admin.viewNurses')->with('success', 'Nurse created successfully');
}


public function index()
{

    $nurseId = Auth::id();


    $patients = Patient::where('nurse_id', $nurseId)->get();

    // Récupérez toutes les infirmières (nurses)
    $nurses = User::where('role', 'nurse')->get();

    return view('patient.index', compact('patients', 'nurses'));
}

public function show($id)
{
    $patient = Patient::findOrFail($id);
    return view('patient.show', compact('patient'));
}


public function edit($id)
{
    $nurse = User::find(Auth::id());

    // Récupérez le patient à modifier (remplacez 'Patient' par le nom de votre modèle patient si nécessaire)
    $patient = Patient::find($id);


    // Passez les variables $nurse et $patient à la vue
    return view('patient.edit', compact('nurse', 'patient'));
}

public function update(Request $request, $id)
{
    $patient = Patient::findOrFail($id);
    $patient->update($request->all());

    return redirect()->route('view', $patient->id)->with('success', 'Patient updated successfully');
}

public function destroy($id)
{
    $patient = Patient::findOrFail($id);
    $patient->delete();
    return redirect()->route('nurse.home')->with('success', 'Patient deleted successfully');
}


}
