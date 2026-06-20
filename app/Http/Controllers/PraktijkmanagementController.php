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
    $users = $this->userModel->getUsersWithRoles();

    return view('praktijkmanagement.userroles', [
        'title' => 'Gebruikersrollen',
        'users' => $users
    ]);
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    // Haalt de gebruiker op die een wijziging krijgt.
$user = $this->userModel->sp_GetUserById($id);

    // Haalt alle gebruikersrollen op voor de select
    $userroles = $this->userModel->sp_GetAllUserroles();

    return view('Praktijkmanagement.edit', [
        'title' => 'Wijzig de gebruikersrol',
        'user' => $user,
        'userroles' => $userroles
    ]);
}



/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // dd($request->all());

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'max:255'],
        'rolename' => ['required', 'string']
    ]);

    // dd($validated);

    $affected = $this->userModel->sp_UpdateUser(
        $id,
        $validated['name'],
        $validated['email'],
        $validated['rolename']
    );

    if ($affected == 0) {
        return back()->with('error', 'Er is niets gewijzigd of error bestaat niet');
    }

    return redirect()->route('praktijkmanagement.userroles')
                     ->with('success', 'User succesvol bijgewerkt');
}


public function destroy(string $userId)
{
    $result = $this->userModel->sp_DeleteUser($userId);

    if ($result > 0) {
        return redirect()->route('praktijkmanagement.userroles')
            ->with('success', 'User is succesvol verwijderd');
    }

    return redirect()->route('praktijkmanagement.userroles')
        ->with('error', 'User is niet verwijderd');
}



}