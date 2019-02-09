	@extends('layouts.app')

@section('content')
    <a href="/companies" class="btn btn-default">Go Back</a>
   
	
	<ul class="list-group">
  <li class="list-group-item">{{$company->name}}</li>
  <li class="list-group-item">{{$company->website}}</li>
  <li class="list-group-item">{{$company->email}}</li>
  
  <li class="list-group-item"> <img style="width:100%" src="/storage/logo_images/{{$company->logo}}">
    </li>
</ul>
	<div  class=="row">
   <div class="col-md-6">
   
   
            <a href="/companies/{{$company->id}}/edit" class="btn btn-primary">Edit</a>
</div>
   <div class="col-md-6">
            {!!Form::open(['action' => ['companiesControler@destroy', $company->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
 </div>
 </div>
@endsection