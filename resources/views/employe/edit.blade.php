@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">edit employe </div>

                <div class="card-body">
                 
			<a href="/employes" class="btn btn-primary"> go back</a>
		
			 {!! Form::open(['action' =>['employesControler@update','$employes->id'],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
            {{Form::label('firstname', 'firstname')}}
          {{Form::text('firstname', $employes->firstname , [ 'class' => 'form-control', 'placeholder' => 'firstname'])}}
          
          
          
          </div>
        <div class="form-group">
            {{Form::label('lastname', 'lastname')}}
            {{Form::text('lastname', $employes->lastname, [ 'class' => 'form-control', 'placeholder' => 'lastname'])}}
        </div>
		 <div class="form-group">
            {{Form::label('phone', 'phone')}}
            {{Form::text('phone', $employes->phone, [ 'class' => 'form-control', 'placeholder' => 'phone'])}}
        </div>
		
		 <div class="form-group">
            {{Form::label('email', 'email')}}
            {{Form::text('email',$employes->email, [ 'class' => 'form-control', 'placeholder' => 'email'])}}
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
		
		
	{{form :: hidden('_method','PUT')}}
	{{form :: submit('submit',['class'=>'btn btn-primary'])}}
	
{!! Form::close() !!}

					
				 
				
                </div>
            </div>
        </div>
    </div>
</div>
@endsection