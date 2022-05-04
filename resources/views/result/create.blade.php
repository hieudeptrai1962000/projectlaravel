<div class="container">
    <div class="row">
        <div class="col-lg-8"> @yield('content') </div>
    </div>
</div>


<div class="well">

    {{ Form::open(array('route' => 'result.store','method' => 'post','enctype' => "multipart/form-data")) }}

    <fieldset>

        <legend>CREATE</legend>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="form-group">

            <h9>Student ID</h9>
            <div class="col-lg-10">
                <select class="form-control" name="student_id">
                    @foreach($student as $stu)
                        <option {{ $stu->id }}>{{ $stu->id }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <h9>Subject ID</h9>
            <div class="col-lg-10">
                <select class="form-control" name="subject_id">
                    @foreach($subject as $su)
                        <option value="{{ $su->id }}">{{ $su->id }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Result:', ['class' => 'col-lg-2 control-label']) !!}
            <div class="col-lg-10">
                {!! Form::text('mark', $value = null, ['class' => 'form-control', 'placeholder' => 'Khoa']) !!}
            </div>
        </div>


    </fieldset>
    {{Form::submit('Submit', array('class' => 'btn btn-success mt-2'))}}

    {!! Form::close()  !!}
    <a href="{{route('student.index')}}" class="btn btn-success btn-add">Back</a>
</div>
</body>

</html>

