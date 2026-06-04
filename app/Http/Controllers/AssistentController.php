<?php

namespace App\Http\Controllers;

class AssistentController extends Controller
{
    public function index()
    {
        return view('Assistent.index', [
            'title' => 'Assistent Home'
        ]);
    }
}