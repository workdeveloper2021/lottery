@extends('layouts.app')
@section('content')

<div class="container">
    <div class="justify-content-center">
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
        <div class="card">
            <div class="card-header">Create user
                <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Users</a>
                </span>
            </div>

            <div class="card-body">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method'=>'PATCH']) !!}
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
@endsection