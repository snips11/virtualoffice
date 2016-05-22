@extends('layouts.admin')
@section('content')
<p class="lead">Customer List</p>

<div class="row">
        <div class="col-md-6" id="cust_search">
            <div id="custom-search-input">
                {!! Form::open(array('route' => 'customers.index', 'method' => 'GET' ,'role'=>'search')) !!}
                <div class="input-group col-md-12" >
                    {!! Form::text('term',Request::get('term'), ['class' =>'form-control input-md','placeholder' =>'Search...']) !!}
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-md" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
	</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Business</th>
                <th>Name</th>
                <th>Telephone</th>
                <th></th>
            </thead>
            <tbody>
                
                @foreach ($customers as $customer)
                
                    <tr>
                        <th>{{$customer->id}}</th>
                        <td>{{$customer->business}}</td>
                        <td>{{$customer->firstname}} {{$customer->surname}}</td>
                        <td>{{$customer->tel}}</td>
                        <td><a href="{{ route ('customers.show', $customer->id)}}" class="btn btn-default">View</a></td>
                    </tr>
                @endforeach
            </tbody>    
        </table>
    </div>    
 </div>
@endsection