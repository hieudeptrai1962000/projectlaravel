<!doctype html>
<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <title>Laravel</title>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8"> @yield('content') </div>
    </div>
</div>


<div class="well">

    {{ Form::open(array('route' => 'faculty.store','method' => 'post')) }}

    <fieldset>

        <legend>CREATE</legend>

        <!-- Email -->

        <div class="form-group">
            {!! Form::label('id', 'ID:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('id', $value = null, ['class' => 'form-control', 'placeholder' => 'ID']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Khoa:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Khoa']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('create_at', 'Ngay Tao:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::date('create_at', $value = null, ['class' => 'form-control2']) !!}
            </div>
        </div>


        <!-- Text Area -->

    </fieldset>
    {{Form::submit('Submit', array('class' => 'btn btn-success mt-2'))}}

    {!! Form::close()  !!}
    <a href="{{route('faculty.index')}}" class="btn btn-success btn-add">Back</a>
</div>
</body>

</html>
