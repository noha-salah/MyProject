<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\company;
use DB;

class companiescontroler extends Controller
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
        //
        
        $companies = company::orderBy('created_at','desc')->paginate(10);
        return view('company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
         return view('company.create');
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
            'name' => 'required|max:40',
             'website' => 'nullable',
			  'email' => 'nullable',
            'logo' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('logo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('logo')->storeAs('public/logo_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create company
        $company = new company;
        $company->name = $request->input('name');
		
	 $company->email= $request->input('email');
       $company->website = $request->input('website');
        $company->logo= $fileNameToStore;
        $company->save();

        return redirect('/companies')->with('success', ' Commpany created successful');
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
         $company = company::find($id);
        return view('company.show')->with('company', $company);
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
         $company = company::find($id);

      

        return view('company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required|max:40',
             'website' => 'nullable',
			  'email' => 'nullable',
            'logo' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('logo')){
            // Get filename with the extension
            $filenameWithExt = $request->file('logo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('logo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('logo')->storeAs('public/logo_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create company
        $company = company::find($id);
        $company->name = $request->input('name');
		
	 $company->email= $request->input('email');
       $company->website = $request->input('website');
	   
	           if($request->hasFile('logo')){
                    $company->logo= $fileNameToStore;

        }
        $company->save();


        return redirect('/companies')->with('success', ' Company Updated Succeessful');
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
        
        $company = company::find($id);

        // Check for correct user


        if($company->logo != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/logo_images/'.$company->logo);
        }
        
        $company->delete();
		
        return redirect('/companies')->with('success', ' company Removed');
    }
}
