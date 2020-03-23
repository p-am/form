@extends('layouts.template')

    @section('content')

        {{ Form::open(array('route' => 'user', 'class' => 'col-lg-5 col-md-8 col-sm-12 m-auto')) }}
            @csrf
            <div class="form-group">
                <div class="form-group">            
                    {{ Form::label('name', 'Nombre')}}
                    {{ Form::text('name', '', array('class' => 'form-control', 'autofocus')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Correo electrónico') }}
                    {{ Form::email('email', '', array('class' => 'form-control')) }}
                </div>
                @foreach ($questions as $question)
                    <div class="form-group">
                        {{ Form::label('question_' . $question->id, $question->question) }}
                        {{ Form::text('question_' . $question->id, '', array('class' => 'form-control')) }}
                    </div>
                @endforeach
            <div class="form-group">
                {{ Form::checkbox('remember', 'remember', array('class' => 'form-check-input')) }}
                {{ Form::label('remember', 'Recuérdame', array('class' => 'form-check-label')) }}
            </div>
            {{ Form::submit('Registrarse', array('class' => 'btn btn-primary mt-2')) }}
        {{ Form::close() }}

        @if ($errors->any())
        <div class="my-3 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    @endsection

