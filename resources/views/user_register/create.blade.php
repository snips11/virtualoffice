@extends('layouts.app')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<h3> Welcome {{Auth::user()->name}}</h3>
{!! Form::open(array('route' => 'user_register.store', 'data-parsley-validate'=> '')) !!}
    
    {{ Form::hidden('business', Auth::user()->name, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    {{ Form::hidden('email', Auth::user()->email, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('firstname', 'First Name')}}
    {{ Form::text('firstname', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('surname', 'Surname')}}
    {{ Form::text('surname', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('address1', 'Address Line 1')}}
    {{ Form::text('address1', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('address2', 'Address Line 2')}}
    {{ Form::text('address2', null, array('class' => 'form-control', 'maxlength'=>'255'))}}
    
    {{ Form::label('city', 'City')}}
    {{ Form::text('city', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('postcode', 'Post Code')}}
    {{ Form::text('postcode', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('tel', 'Contact Number')}}
    {{ Form::text('tel', null, array('class' => 'form-control', 'required' => '','maxlength'=>'12'))}}
    </br>
    {{ Form::submit('Create Account', array('class' => 'btn btn-success', 'id' => 'create_btn'))}}
{!! Form::close() !!}
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection

