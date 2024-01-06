<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Model\Role;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('person.index', [
            'persons'=> User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
                if(auth()->user()->hasRole('admin')){
                 return view('person.create');
                }
                echo "You do not have permisions to add new Users.";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required',
            "email" => 'email|required|unique:users,email',
            "password" => 'required',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            "status" => "Success"
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $person){
        return view('person.edit', ['person' => $person]);
    }

    public function update(User $person, Request $request){
        if(auth()->user()->hasRole('admin')){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $person->update($data);

        return redirect(route('person.index'))->with('success', 'User Updated Succesffully');
        }
        echo "You do not have permisions to update Users.";
    }


    public function destroy(User $person){
        if(auth()->user()->hasRole('admin')){
        $person->delete();
        return redirect(route('person.index'))->with('success', 'User deleted Succesffully');
        }
        echo "You do not have permisions to delete Users.";
    }
}
