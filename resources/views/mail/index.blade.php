@extends('layouts.app')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<div class="col-md-10 col-md-offset-1 ">
    <h3 class="lead">Your Postal Records</h3></br>
    
   <?php
echo "Today is " . date("d/m/Y") . "<br>";?>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
               
                <th>Business</th>
                <th>Number of items</th>
                <th>Date</th>
               
            </thead>
            <tbody>
                
                @foreach ($customers as $customer)
                
                    <tr>
                        
                        <td>{{$customer->business}}</td>
                        <td>{{$customer->items}}</td>
                        <td>{{date_format($customer->created_at,"d/m/Y")}}</td>
                        
                    </tr>
                @endforeach
            </tbody>    
        </table>
    </div>    
 </div>
</div>
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/form.js') !!}
@endsection