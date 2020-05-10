<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Answer;
use Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyUser(Request $request)
    {
        $answers = collect($_POST)->filter(function ($value, $key) {
            return $value !== 'remember' && strpos($key, '_') && trim($value) !== '';
        })->all();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
        ]);
        if (!count($answers)) {
            $messages = [
                'required' => 'Tienes que responder por lo menos a una de las preguntas.'
            ];
            $validatedData = $request->validate([
                'answer' => 'required'
            ], $messages);
        }
        $user = User::create($_POST);
        foreach ($answers as $id => $value) {
            Answer::create([
                'user_id' => $user->id,
                'question_id' => substr($id, strpos($id, '_') + 1),
                'answer' => $value
            ]);
        }
        $users = User::all()->reverse();
        $winner = User::all()->random();
        return view('layouts.user', compact('users', 'user', 'winner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        
        $validatedData = $request->validate([
            'name' => 'required|unique:posts|max:255'
        ]);


        // dump($_POST);
        // dd('completo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $users = User::find($id);
        return view('layouts.user', compact('users'));
    }

    /**
     * Display all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function listUsers()
    {
        $users = User::all();
        return view('layouts.user', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
