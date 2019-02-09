@extends('layouts.app')

@section('content')
    <h1>Companies</h1>
    
 <a href="/companies/create"  class="btn btn-primary"> New company</a>
       <hr>         
            <div class="well">
                <div class="row">
                     <div class="col-md-8 col-sm-8">
					
	<table class="table">
  <thead>
    <tr>
    
      <th scope="col"> Name</th>
      <th scope="col">Logo</th>
      <th scope="col">Website </th>
	   
	   
	    <th scope="col">Email </th>
	    
	      	       <th scope="col">Action </th>
    </tr>
  </thead>
    @if(count($companies) > 0)
        @foreach($companies as $company)
  <tbody>
    
    <tr>
    
        
      <td scope="row">{{$company->name}}</td>
 
      <td><img src="/storage/logo_images/{{$company->logo}}"  width="100px"  height="80px"></td>
      
	    <td>{{$company->website}}</td>
		  <td>{{$company->email}}</td>
		  
		  
		  <td scope="row">
		  
		  
            {!!Form::open(['action' => ['companiesControler@destroy', $company->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('x', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
		  
		  

                                        
		  <a href="/companies/{{$company->id}}"class="btn btn-primary">show</a><br>
		  
		  <a href="/companies/{{$company->id}}/edit"class="btn btn-primary">edit</a>
		  
		  </td>
    </tr>
	
	  </tbody>
	        @endforeach
      
    @else
        <p>No Company found</p>
    @endif
</table>
					  
					
  
@endsection