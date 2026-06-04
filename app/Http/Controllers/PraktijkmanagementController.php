<?php

namespace App\Http\Controllers;

class PraktijkmanagementController extends Controller
{
    public function index()
    {
        return view('Praktijkmanagement.index', [
            'title' => 'Praktijkmanagement Home'
        ]);
    }
}
