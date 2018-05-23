@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if(Session::has('messages'))
                <div class="alert alert-success">
                    {!! Session::get('messages')!!}
                </div>
            @endif
        </div>
        @include('common.errors')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('login.login') }}</div>
                <div class="panel-body">
                    {!! Form::open(array('route' => 'login', 'class' => 'form-horizontal')) !!}
                        <div class="form-group">
                            {!! Form::label('username', trans('login.username'), array('class' => 'col-sm-2 control-label')) !!}
                            <div class="col-sm-10">
                                {!! Form::text('username', '', array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', trans('login.password'), array('class' => 'col-sm-2 control-label')) !!}
                            <div class="col-sm-10">
                                {!! Form::text('password', '', array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                {!! Form::submit(trans('login.login'), array('class' => 'btn btn-success')) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

