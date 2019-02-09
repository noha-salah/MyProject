@extends('layouts.app')

@section('content')
    <h1>employees</h1>
    
 <a href="/employes/create"  class="btn btn-primary"> New  employe</a>
       <hr>         
            <div class="well">
                <div class="row">
                     <div class="col-md-8 col-sm-8">
					
	<table class="table">
  <thead>
    <tr>
    
      <th scope="col">First Name</th>
      <th scope="col">Last name</th>
      
	   <th scope="col">Phone</th>
	   
	    <th scope="col">Email </th>
	    
	     
	       <th scope="col">Action </th>
    </tr>
  </thead>
    @if(count($employes) > 0)
        @foreach($employes as $employe)
  <tbody>
  <tr>    
  <td scope="row">{{$employe->firstname}}</td>
 
      <td>{{$employe->lastname}}</td>
     
	    <td>{{$employe->phone}}</td>
		<td>{{$employe->email}}</td>
		 
		  <td scope="row">
		  
             {!!Form::open(['action' => ['employesControler@destroy', $employe->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('x', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
            
           <a href="/employes/{{$employe->id}}"class="btn btn-primary">show</a>
       
		   
    </tr>
	
		  
		
	  </tbody>
	        @endforeach
      
    @else
        <p>No employe found</p>
    @endif
</table>
					  
					
  
@endsection