@extends('layouts.app')
@section('content')
<div class="container-fluid">
      <!-- Page Header -->
      <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Retailer</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Retailer</li>
            </ol>
        </div>
        
    </div>
    <!-- End Page Header -->

    <!-- Row-->
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
           
            <div class="card-header">Retailer Details
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
                </span>
            </div>
            <div class="card-body">
            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                   <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control','request')) !!}
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control','request')) !!}
                            </div>
                        </div>   
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Contact:</strong>
                                {!! Form::number('contact', null, array('placeholder' => 'Contact','class' => 'form-control','request')) !!}
                            </div>
                        </div>   
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>GST No:</strong>
                                {!! Form::text('gst', null, array('placeholder' => 'GST No','class' => 'form-control','request')) !!}
                            </div>
                        </div> 
                         <div class="col-md-3">
                            <div class="form-group">
                                <strong>Pan No:</strong>
                                {!! Form::text('panno', null, array('placeholder' => 'Pan No','class' => 'form-control','request')) !!}
                            </div>
                        </div> 
                          <div class="col-md-12">
                            <div class="form-group">
                                <strong>Address:</strong>
                                {!! Form::textarea('address', null, array('placeholder' => 'Address','class' => 'form-control','request')) !!}
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Password:</strong>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>    
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Confirm Password:</strong>
                                {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>   
                       
                        <div class="col-md-3">
                            <div class="form-group">
                                <strong>Status:</strong>
                                {!! Form::select('status', array(1=>'Active',0 => 'Disable'),null, array('class' => 'form-control')) !!}
                            </div>
                        </div>    
                    </div>    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

</div>
@endsection