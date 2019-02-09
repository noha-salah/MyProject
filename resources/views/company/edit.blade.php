@extends('layouts.app')

@section('content')
    <h1>Edit company</h1>
    {!! Form::open(['action' => ['companiesControler@update', $company->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'name')}}
            {{Form::text('name', $company->name, ['class' => 'form-control', 'placeholder' => 'name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'email')}}
            {{Form::text('email', $company->email, [ 'class' => 'form-control', 'placeholder' => 'email'])}}
        </div>
		 <div class="form-group">
            {{Form::label('website', 'website')}}
            {{Form::text('website', $company->website, [ 'class' => 'form-control', 'placeholder' => 'Website'])}}
        </div>
        <div class="form-group">
            {{Form::file('logo')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection