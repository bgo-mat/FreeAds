<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Resources\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->sendEmailVerificationNotification();
        return view('confirm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dataToUpdate = [];
        if ($request->filled('name')) {
            $dataToUpdate['name'] = $request->name;
        }
        if ($request->filled('email')) {
            $dataToUpdate['email'] = $request->email;
        }
        if ($request->filled('password')) {
            $dataToUpdate['password'] = bcrypt($request->password);
        }

        if (!empty($dataToUpdate)) {
            $user->update($dataToUpdate);
            return redirect()->route('user.accueil');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $user=Auth::user();
       $user->delete();
        return redirect()->route('landing.page');
    }
    public function read()
    {
        $user=Auth::user();
        return view('infoProfil',["user"=>$user]);
    }
}
