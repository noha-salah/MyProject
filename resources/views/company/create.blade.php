@extends('layouts.app')

@section('content')
    <h1>Create  Company</h1>
    {!! Form::open(['action' => 'companiesControler@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
		
        <div class="form-group">
            {{Form::label('email', 'email')}}
            {{Form::text('email', '', [ 'class' => 'form-control', 'placeholder' => 'Email'])}}
        </div>
		
		 <div class="form-group">
            {{Form::label('website', 'website')}}
            {{Form::text('Website', '', [ 'class' => 'form-control', 'placeholder' => 'Website'])}}
        </div>
		
		
        <div class="form-group">
            {{Form::file('logo')}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

