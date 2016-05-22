<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customers;
use Session;




class CustomerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
      /*public function __construct()
    {
        $this->middleware('auth');
    }*/
     
   
     
     public function index(Request $request)
     {
   
          if($term = $request->get('term')){
              
              $customers = customers::where('firstname', 'like', '%' .$term.'%')->get(); 
              
          }
            else{
              $customers = customers::all(); 
         
            }     
               
     
         return view ("customers.index")->with('customers',$customers);
         
        
}
    
    public function create()
    {   return view ('customers.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, array (
            'business' => 'required|max:255|unique:customers,business',
            'firstname' => 'required|max:255',
            'surname' => 'required|max:255',
            'address1' => 'required|max:255',
            'address2' => 'required|max:255',
            'city' => 'required|max:255',
            'postcode' => 'required|max:255',
            'tel' => 'required|max:255',
            'email' => 'required|max:255|email',
            'post' => '',
            'telans' => '',
            'conum' => '',
        ));
        //store
        $post = new Customers;
        
        $post->business = $request->business;
        $post->firstname = $request->firstname;
        $post->surname = $request->surname;
        $post->address1 = $request->address1;
        $post->address2 = $request->address2;
        $post->city = $request->city;
        $post->postcode = $request->postcode;
        $post->tel = $request->tel;
        $post->email = $request->email;
        $post->post = $request->post;
        $post->telans = $request->telans;
        $post->conum = $request->conum;
        
        //save
        $post->save();
        
        //session flash message
        Session::flash('success','This customer has now been added');
        
        //redirect
return redirect()->route('customers.index');}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Customers::find($id);
        return view ('customers.show') -> withcustomer($post);
        
        //
        
       
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
    }
    
}