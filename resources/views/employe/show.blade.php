@extends('layouts.app')

@section('content')
    <a href="/employes" class="btn btn-primary">Go Back</a>

 
 
 
  <ul class="list-group">
  <li class="list-group-item"> {{ $employe->firstname}}</li>
  <li class="list-group-item">{{ $employe->lastname}}</li>
  <li class="list-group-item">{{ $employe->phone}}</li>
  <li class="list-group-item"> {{ $employe->email}}</li>
   
  
  

</ul>
  
           

            {!!Form::open(['action' => ['employesControler@destroy', $employe->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
    
@endsection
