<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return  view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $names = [
            'Tony',
            'John',
            'Lee',
            'Tom',
            'Bill',
        ];

        $surnames = [
            'Dou',
            'Smith',
            'Watson',
            'Johnson',
            'Oldman',
        ];

        $name = $names[array_rand($names)];

        $lower_case_name = mb_strtolower($name);

        $surname = $surnames[array_rand($surnames)];

        $lower_case_surname = mb_strtolower($surname);

        $email = $lower_case_name . '.' . $lower_case_surname . '@gmail.com';

        return view('admin.users.create', compact('name', 'surname', 'email'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = $request->all();

        $parameters['password'] = bcrypt($parameters['password']);

        User::create($parameters);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return  view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $parameters = $request->all();

        if ($user->password != bcrypt($request->password) and $request->password != '') {
            $parameters['password'] = bcrypt($parameters['password']);
        }

        $user->update($parameters);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
