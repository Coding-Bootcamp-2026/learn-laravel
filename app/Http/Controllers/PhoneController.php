<?php

namespace App\Http\Controllers;

use App\Models\Phone;

class PhoneController extends Controller
{
    public function index()
    {
        $phones = Phone::with('user')->get();

        return view('phones/index', compact('phones'));
    }
}
