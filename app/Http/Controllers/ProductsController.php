<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customers;
use Session;
use Mail;
class ProductsController extends Controller
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
        return view ('products.index');
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
    {}
      /* $this->validate($request, array (
            'post' => 'required_with:mailbox',
            'mailbox' => '',
            'conum' => '',
            'prefix' => '',
            'telans' => '',
            'TC' => 'required',
            }
        ));
        
        //store
        $post =  App\Customers::
        
        $flight = App\Flight::find(1);
        
        $post->post = $request->post;
        $post->postpro = $request->mailbox;
        $post->telans = $request->telans;
        $post->conum = $request->conum;
        $post->prefix = $request->prefix;
        $post->tc = $request->TC;
        
        //save
        $post->save();
        
        //session flash message
        //Session::flash('success','This customer has now been added');
        
        //redirect
return redirect('/home');}
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $user = customers::findOrFail($id);
        
$email=['email' => $user];
     
        Mail::send('emails.post', ['email' => $email], function ($m) use ($user) {
            $m->from('virtual@officeflexuk.com', 'Office Flex Mailbox');

            $m->to('parsonsjames10@gmail.com', $user->business)->subject('Office Flex have '.$user->items.' piece(s) of mail for you.');
        });
        Session::flash('success','You are ready to go!');
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //$post = Customers::find($id);
      //  return view ('products.edit') -> withPost($post);
      
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
            'post' => '',
            'mailbox' => '',
            'conum' => '',
            'prefix' => '',
            'telans' => '',
            'TC' => 'required',
            
        ));
        
        //store
        $post = Customers::find($id);
        
        
        
        $post->post = $request->input('post');
        $post->postpro = $request->input('mailbox');
        $post->telans = $request->input('telans');
        $post->conum = $request->input('conum');
        $post->prefix = $request->input('prefix');
        $post->tc = $request->input('TC');
        $post1=$post->id;
        //save
        
        
        $post->save();
        
        //session flash message
        //Session::flash('success','This customer has now been added');
        
        //redirect
return redirect()->route('products.show', array('customers' => $post1));
    
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
