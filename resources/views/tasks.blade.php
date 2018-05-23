<!-- resources/views/tasks.blade.php -->
@extends('layouts.app')
@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <div class="col-md-6 col-md-offset-3">
            @if(Session::has('messages'))
                <div class="alert alert-success">
                    {{ Session::get('messages') }}
                </div>
            @endif
        </div>
        <div class="clearfix"></div>
        <div class="container-fluid">
        <!-- New Task Form -->
        {!! Form::open(array('action' => 'TaskController@store', 'class' => 'form-horizontal')) !!}
            <div class="form-group">
                {!! Form::label('email', trans('message.label_task'), array('class' => 'col-sm-3 control-label')) !!}
                <div class="col-sm-6">
                {!! Form::text('name', '', array('class' => 'form-control')) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                {!! Form::submit(trans('message.add_task'), array('class' => 'btn btn-success')) !!}
                </div>
            </div>
        {!! Form::close() !!}
        </div>
    </div>
    <!-- View Task -->
    <div class="container-fluid">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('message.label_task2') }}
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <!-- Table Headings -->
                        <thead>
                            <th>Stt</th>
                            <th>{{ trans('message.label_task') }}</th>
                            <th></th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                            @php $stt = 0 @endphp
                            @foreach ($tasks as $task)
                            @php $stt = $stt + 1 @endphp
                                <tr>
                                    <!-- Task Name -->
                                    <td>{{ $stt }}</td>
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>

                                    <td>
                                        <a href="{{ action('TaskController@show', $task->id) }}" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
