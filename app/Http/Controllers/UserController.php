<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::all();
            return response()->json([
                'users' => $users,
                'status' => true
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ]);
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->celphone = $request->celphone;
            $user->type_identification = $request->type_identification;
            $user->identification_number = $request->identification_number;
            $user->address = $request->address;
            $user->type = $request->type;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $res = $user->save();
            return response()->json([
                'users' => "Usuario creado",
                'status' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        try {
            $user =  User::findOrFail($id);
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->celphone = $request->celphone;
            $user->type_identification = $request->type_identification;
            $user->identification_number = $request->identification_number;
            $user->address = $request->address;
            $user->type = $request->type;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $res = $user->save();
            return response()->json([
                'users' => "Usuario actualizado",
                'status' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $user =  User::findOrFail($id);
            $user->delete();
            return response()->json([
                'users' => "Usuario eliminado",
                'status' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'status' => false
            ]);
        }
    }
}
