<?php

namespace App\Http\Controllers;

class TesterController extends Controller
{
    public function index()
    {
        return view('Tester.index', [
            'title' => 'Tester Home'
        ]);
    }
}