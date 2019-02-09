<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\employe;
use App\company;

use DB;

class employescontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
     
			 public function __construct()
    {
        $this->middleware('auth');
        
        }
			
    public function index()
    {
    
    
    $company=company::all();
      $employes = employe::orderBy('created_at','desc')->paginate(10);
        return view('employe.index',compact('employes', 'company'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    
           
        	
	$companies=   company ::all();
		
		return view('employe.create')->with('companies',$companies);
    
  
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        
        
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
			'phone' => 'nullable|max:10',
			'email' => 'nullable',
			'company_id'=>'nullable',
			

           
        ]);
		$employe = new employe;
        $employe->firstname= $request->input('firstname');
		  $employe->lastname= $request->input('lastname');
		    $employe->phone= $request->input('phone');
		  $employe->email= $request->input('email');
		    $employe->company_id= $request->input('company_id');
        $employe->save();

        return redirect('/employes')->with('success', ' employee  Created successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        
        	
	$employe= employe ::find($id);
		
		return view('employe.show')->with('employe',$employe);
	
	
	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $companies=   company ::all();
		
        
        	$employes  =  employe::find($id);
		
		return view('employe.edit',compact('employes','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
			'phone' => 'nullable|max:10',
			'email' => 'nullable',
			'company_id'=>'nullable'
           
        ]);
        
		$employes =  employe ::find($id);
		
        $employes->firstname= $request->input('firstname');
		  $employes->lastname= $request->input('lastname');
		    $employes->phone= $request->input('phone');
		  $employes->email= $request->input('email');
		  
      $employes->company_id= $request->input('company_id');
		  
        $employes->save();
       
	
return redirect('/employes')->with('success','Employee update Successful');
	
		
		
	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        
        
		$employe=employe::find($id);
		
		
	

        
	
	$employe->delete();
		
	return redirect('/employes')->with('success',' employee delete successfful');
    }
}
