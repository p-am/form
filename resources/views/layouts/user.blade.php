@extends('layouts.app')
    @section('content')
        <div class="row">
            @isset ($winner)
                <div class="card text-white bg-success mr-lg-3 col-lg-3 col text-center h-100 mb-3 mb-lg-0">
                    <div class="card-header">
                        <h1>
                            {{ __('fields.win') }}
                        </h1>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $winner->name }}</h5>
                        <p class="card-text">{{ $winner->email }}</p>
                    </div>
                </div>
            @endisset
            <table class="table border border-secondary rounded 
                @isset($winner) 
                    col-lg-8 
                @endisset 
                col">
                <thead class="thead-dark rounded">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $value)
                        <tr 
                            @isset ($user)
                                @if ($value->id == $user->id) 
                                    class="table-active" 
                                @endif
                            @endisset
                        >
                            <th scope="row">{{ $value->id }}</th>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection