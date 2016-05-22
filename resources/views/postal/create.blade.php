@extends('layouts.admin')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
{!! Form::open(array('route' => 'customers.store', 'data-parsley-validate'=> '')) !!}
    {{ Form::label('business', 'Business Name')}}
    {{ Form::text('business', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('firstname', 'First Name')}}
    {{ Form::text('firstname', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('surname', 'Surname')}}
    {{ Form::text('surname', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('address1', 'Address Line 1')}}
    {{ Form::text('address1', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('address2', 'Address Line 2')}}
    {{ Form::text('address2', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('city', 'City')}}
    {{ Form::text('city', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('postcode', 'Post Code')}}
    {{ Form::text('postcode', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    {{ Form::label('tel', 'Contact Number')}}
    {{ Form::text('tel', null, array('class' => 'form-control', 'required' => '','maxlength'=>'12'))}}
    
    {{ Form::label('email', 'Email')}}
    {{ Form::text('email', null, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    
    {{ Form::submit('Create Customer', array('class' => 'btn btn-success', 'id' => 'create_btn'))}}
{!! Form::close() !!}
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection

