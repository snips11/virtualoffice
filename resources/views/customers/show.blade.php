@extends('layouts.admin')



@section('content')
<div class="col-md-10 col-md-offset-1 ">
    <h3 class="lead">Customer Details</h3></br>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{$customer->business}} <small style="float:right">Last updated: {{$customer->updated_at}}</br>Customer created: {{$customer->created_at}}</small></h3>
  </div>
  <div class="panel-body">
    <p>
<strong>First Name</strong></br>
{{$customer->firstname}}</br>
<strong>Surname</strong></br>
{{$customer->surname}}</br>
<strong>Address</strong></br>
{{$customer->address1}}</br>
{{$customer->address2}}</br>
<strong>City</strong></br>
{{$customer->city}}</br>
<strong>Post Code</strong></br>
{{$customer->postcode}}</br>
<strong>Contact Telephone</strong></br>
{{$customer->tel}}</br>
<strong>Contact Email</strong></br>
{{$customer->email}}</br>

</p>
  </div>
</div>
</div>



@endsection
