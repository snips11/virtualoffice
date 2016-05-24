<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\postal;
Use App\customers;
use Session;
use Mail;

class postalscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
       public function __construct()
    {   $this->middleware('auth');
        $this->middleware('admin');
    }
     
    public function index()
    {
     
     
     $customers = customers::where('post', '=', 1)->get();
               
     
         return view ("postal.index")->with('customers',$customers);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
         //validate
        $this->validate($request, array (
            'business' => 'required',
            'email' => 'required',
            'items' => 'required|integer|min:1',
        ));
        //store
        $post = new postal;
        
        $post->business = $request->business;
        $post->items = $request->items;
        $post->email = $request->email;
        
        //save
        $post->save();
       
        $post1 = $post->id;
        //session flash message
        
        
        //redirect
        
return redirect()->route('postal.show', array('postal' => $post1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     /*   $post = postal::find($id);
        return view ('postal.show') -> withpostal($post);
    }
    
    
    public function postsend(Request $request, $id)
    { */
        $user = postal::findOrFail($id);
        
$email=['email' => $user];
     
        Mail::send('emails.post', ['email' => $email], function ($m) use ($user) {
            $m->from('virtual@officeflexuk.com', 'Office Flex Mailbox');

            $m->to($user->email, $user->business)->subject('Office Flex have '.$user->items.' piece(s) of mail for you.');
        });
        Session::flash('success','Mail sent');
        return redirect()->route('postal.index');
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
