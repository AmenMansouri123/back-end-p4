<?php

namespace App\Http\Controllers;

class MondhygienistController extends Controller
{
    public function index()
    {
        return view('Mondhygienist.index', [
            'title' => 'Mondhygienist Home'
        ]);
    }
}
