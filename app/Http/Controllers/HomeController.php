<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('home');
    }


    public function adminHome()
    {
        return view('adminHome');
    }


    public function cashier()
    {
        return view('cashier');
    }


    public function nurse()
{
    $patients = Patient::all();
    return view('nurse', compact('patients'));
}



    public function doctor()
    {
        return view('doctor');
    }

}
