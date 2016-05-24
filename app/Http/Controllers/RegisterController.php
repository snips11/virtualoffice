<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customers;
use Mail;
use Session;
class RegisterController extends Controller
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
        return view ('user_register.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user_register.create');
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
            'address2' => 'max:255',
            'city' => 'required|max:255',
            'postcode' => 'required|max:255',
            'tel' => 'required|max:255',
            'email' => 'required|max:255|email',
            
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
    
        
        //save
        $post1 = $post->id;
        $post->save();
        
        //session flash message
        //Session::flash('success_user','Congratulations you are ready to go.');
        
        //redirect
//return redirect()->route('user_register.show', $post1);
return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      /*$user = customers::findOrFail($id);

        Mail::send('emails.post', ['email' => 'james@officeflexuk.com'], function ($m) use ($user) {
            $m->from('virtual@officeflexuk.com', 'Office Flex Mailbox');

            $m->to('james@officeflexuk.com', $user->business)->subject('Office Flex has a new customer: '.$user->name.'.');
        });
        Session::flash('success','Mail sent');
        return redirect()->route('products.index');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
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
       $this->validate($request, array (
            
            'firstname' => 'required|max:255',
            'surname' => 'required|max:255',
            'address1' => 'required|max:255',
            'address2' => 'max:255',
            'city' => 'required|max:255',
            'postcode' => 'required|max:255',
            'tel' => 'required|max:255',
            'email' => 'required|max:255|email',
            
        ));
        
        //store
        $post = Customers::find($id);
        
        
        
        $post->firstname = $request->input('firstname');
        $post->surname = $request->input('surname');
        $post->address1 = $request->input('address1');
        $post->address2 = $request->input('address2');
        $post->city = $request->input('city');
        $post->postcode = $request->input('postcode');
        $post->tel = $request->input('tel');
        $post->email = $request->input('email');
        $post1=$post->id;
        //save
        
        
        $post->save();
        
        //session flash message
        Session::flash('success','Your details have been updated');
        
        //redirect
return view('home');
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
