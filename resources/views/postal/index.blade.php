@extends('layouts.admin')
@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection
@section('content')
<div class="col-md-10 col-md-offset-1 ">
    <h3 class="lead">Postal Records</h3></br>
    
   <?php
echo "Today is " . date("d/m/Y") . "<br>";?>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Business</th>
                <th>Telephone</th>
                <th>Pieces of mail</th>
                <th>SEND</th>
            </thead>
            <tbody>
                
                @foreach ($customers as $customer)
          
                    <tr>
                        <th>{{$customer->id}}</th>
                        <td>{{$customer->business}}</td>
                        <td>{{$customer->tel}}
                        {!! Form::open(array('route' => 'postal.store', 'data-parsley-validate'=> '')) !!}</td>
                        <input type="hidden" name="business" value="{{$customer->business}}" class = "form-control">
                        <input type="hidden" name="email" value="{{$customer->email}}" class = "form-control">
                        <td>{{ Form::number('items', '', array('class' => 'form-control', 'required' => '','maxlength'=>'255'))}}</td>
                        <td>   
                        {{ Form::submit('SEND INFO', array('class' => 'btn btn-success'))}}
                        {!! Form::close() !!}</td>
                    </tr>
                @endforeach
            </tbody>    
        </table>
    </div>    
 </div>
@endsection
@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
@endsection