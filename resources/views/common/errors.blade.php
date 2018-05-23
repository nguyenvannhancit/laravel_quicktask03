@if (count($errors))
    <div class="col-md-6 col-md-offset-3">
        <div class="alert alert-danger">
            <strong>{{ trans('message.error_message') }}!</strong>
            <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

