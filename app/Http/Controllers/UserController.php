<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $questions = true;
        $questions_key = preg_grep('/^question_/', array_keys($_POST));
        $question_key = array_shift($questions_key);

        $messages = [
            $question_key . $questions => 'Tienes que responder por lo menos a una de las preguntas.'
        ];
        // dd($question_key);
        // dd($questions, $question_key);
        $validator = Validator::make([$question_key], [
            $question_key => [
                'required',
                false
                
            ]
        ], $messages);
        foreach ($_POST as $key => $value) {
            if (preg_match('/^question_/', $key) && $value !== '') {
                $questions = false;
            }
        }
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            $question_key => $questions
        ]);
        $user = new User;
        $user->create($_POST);
        return view('layouts.user', compact('user'));
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
        //
        // $user = User::find($id);
        // foreach ($user as $key => $data) {
        //     dump($key, $data);
        // }
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
