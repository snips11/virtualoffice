@extends('layouts.app')

@section('content')
<?php
$user = Auth::user()->name;
$company = DB::table('customers')->where('business', $user )->value('business');?>
@if (is_null($company))

<div class="alert alert-danger" role="alert">
Please <strong><a href="/user_register">click here</a></strong> to register full company details</strong>
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
Please <strong><a href="{{ route ('products.edit', Auth::user()->id)}}">click here</a></strong> to select your products</strong>
</div>
@endif 
@endif  




<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
