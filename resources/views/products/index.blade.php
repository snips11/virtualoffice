@extends('layouts.app')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<h3> Welcome {{Auth::user()->name}}</h3>
<?php
$id = DB::table('customers')->where('business', Auth::user()->name)->pluck('id');
$iid=implode($id);
?>
{!! Form::model('Customers', ['route'=>['products.update', $iid],'method' => 'PUT']) !!}
    
 {{ Form::hidden('business', Auth::user()->name, array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}
    
    
    {{ Form::label('post', 'Mailbox')}}
    {{ Form::checkbox('post',1, 0, array('class' => 'form-control'))}}
        <div id="extra_form">
        {{ Form::label('mailbox', 'Mailbox Option')}}</br>
        {{ Form::select('mailbox', array('rolling' => 'Rolling','month' => 'Monthly','year' => 'Yearly'), 'null', array('class' => 'form-control'))}}
        </div>
    {{ Form::label('conum', 'Company Number')}}
    {{ Form::checkbox('conum',1, 0, array('class' => 'form-control'))}}
        <div id="extra_form1">   
        {{ Form::label('prefix', 'Preferred number prefix')}}
        {{ Form::tel('prefix', 0, array('class' => 'form-control'))}}
        </div>
    {{ Form::label('telans', 'Telephone Answering')}}
    {{ Form::checkbox('telans',1, 0, array('class' => 'form-control'))}}
        <hr>
        <div id="extra_form3">
            {{ Form::label('posttc', 'Mailbox Terms and Conditions')}}</br>
            Click here
        </div>
        <div id="extra_form2">
            {{ Form::label('conumtc', 'Company Number Terms and Conditions')}}</br>
            Click here
        </div>
        <div id="extra_form4">
            {{ Form::label('telanstc', 'Telephone Answering Terms and Conditions')}}</br>
            Click here
        </div>-->
    {{ Form::label('TC', 'I accept the Office Flex terms and conditions.')}}
    {{ Form::checkbox('TC',1, 0, array('class' => 'form-control','required'=>''))}}
    {{ Form::submit('Select Product', array('class' => 'btn btn-success', 'id' => 'create_btn'))}}
{!! Form::close() !!}
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/form.js') !!}
@endsection