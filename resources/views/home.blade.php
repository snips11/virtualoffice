@extends('layouts.app')

@section('content')
<?php
$user = Auth::user()->name;
$company = DB::table('customers')->where('business', $user )->value('business');?>
@if (is_null($company))

<div class="alert alert-danger" role="alert">
Please <strong><a href="{{ route ('user_register.create')}}">click here</a></strong> to register full company details</strong>
</div>
@endif 


<?php
function checkIsset($val) {
    return count(array_filter($val));
}

$company1 = DB::table('customers')->select('post', 'telans','conum')->where('business', $user )->get();

$array = json_decode(json_encode($company1), true);

$filteredArr = array_filter($array, 'checkIsset');

?>
@if (empty($filteredArr))
@if ( !is_null($company)) 


<div class="alert alert-danger" role="alert">
Please <strong><a href="{{ route ('products.index', Auth::user()->id)}}">click here</a></strong> to select your products</strong>
</div>
@endif 
@endif  




<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>{{Auth::user()->name}} Dashboard</h4>
                </div>
                    <div class="panel-body" style="padding-top: 30px;"> 
                       <div class="col-sm-4" >
                           <a href="{{ route ('mail.show', Auth::user()->name)}}"><div class="panel panel-default" id="menu_icon">
                               <div class="panel-body">
                               <i class="fa fa-envelope-o fa-5x" ></i>
                               </div>
                               <div class="panel-footer">Mail</div>
                           </div></a>
                      </div>
                      <div class="col-sm-4">
                           <div class="panel panel-default" id="menu_icon">
                               <div class="panel-body">
                               <i class="fa fa-phone fa-5x"></i>
                               </div>
                               <div class="panel-footer">Company Number</div>
                           </div>
                      </div>
                      <div class="col-sm-4">
                           <div class="panel panel-default" id="menu_icon">
                               <div class="panel-body">
                               <i class="fa fa-user fa-5x"></i>
                               </div>
                               <div class="panel-footer">Telephone Answering</div>
                           </div>
                      </div>Company Number and Telephone Answering portal coming soon.
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
