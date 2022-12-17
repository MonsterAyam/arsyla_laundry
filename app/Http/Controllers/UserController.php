<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengguna.index', [
            "data" => User::orderBy('role_id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "username" => "required|max:10|unique:users,username",
            "name" => "required|max:30",
            "email" => "required|email|unique:users,email",
            "address" => "required",
            "image" => "image|file|max:1024",
            "password" => "required|min:5"
        ]);

        if($request->file('image'))
        {
            $validateData['image'] = $request->file('image')->store('profil-pengguna');
        }

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return back()->with('success', 'Pengguna Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pengguna.edit', [
            "data" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            "username" => "required|min:5|max:10",
            "name" => "required|max:30",
            "email" => "required|email",
            "address" => "required",
            "password" => "required",
            "role_id" => "required"
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::where('id', $user->id)
            ->update($validateData);

        return redirect('/dashboard/user')->with('success', 'Data Pengguna Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->image)
        {
            Storage::delete($user->image);
        }
        User::destroy($user->id);

        return back()->with('success', 'Pengguna Berhasil Dihapus!');
    }
}
