<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PraktijkmanagementController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $users = $this->userModel->getUsersWithRoles();
        return view('praktijkmanagement.index', compact('users'));
    }


    // public function destroy($id)
    // {
    //     $user = $this->userModel->find($id);
    //     if ($user) {
    //         $user->delete();
    //     }
    //     return redirect()->route('praktijkmanagement.index');
    // }

    public function manageUserroles()
    {
        $this->userModel->updateUserRoles(auth()->user()->id, request('roles'));
        $users = $this->userModel->getUsersWithRoles();
        return view('Praktijkmanagement.userroles', ['title' => 'Gebruikersrollen', 'users' => $users]);
    }

}