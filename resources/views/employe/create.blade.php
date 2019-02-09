@extends('layouts.app')

@section('content')
    <h1>Create Employee</h1>
    {!! Form::open(['action' => 'employesControler@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
	
        <div class="form-group">
            {{Form::label('firstname', 'firstname')}}
            {{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'firstname'])}}
        </div>
        <div class="form-group">
            {{Form::label('lastname', 'lastname')}}
            {{Form::text('lastname', '', [ 'class' => 'form-control', 'placeholder' => 'lastname'])}}
        </div>
		 <div class="form-group">
            {{Form::label('phone', 'phone')}}
            {{Form::text('phone', '', [ 'class' => 'form-control', 'placeholder' => 'phone'])}}
        </div>
		
		 <div class="form-group">
            {{Form::label('email', 'email')}}
            {{Form::text('email', '', [ 'class' => 'form-control', 'placeholder' => 'email'])}}
        </div>
		
        <div class="form-group">
		 {{Form::label('company', 'company')}}
	
   @if(count($companies) > 0)
      
        <select  name="company_id"  class ='form-control'>
          @foreach($companies as $company)
        
<option value="{{$company->id}}">
{{ $company->name}}
</option>
@endforeach
</select>
     
       
        @endif
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}   {!! Form::close() !!}
@endsection
