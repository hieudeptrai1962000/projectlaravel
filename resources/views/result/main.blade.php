@extends('layouts/layout')
<div class="container">
    <h1>Result</h1>
    <a href="{{route('result.create')}}" class="btn btn-success btn-add" id="addst" data-target="#modal-add"
       data-toggle="modal">Add</a>
    <a style="background-color: brown" href="{{route('student.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Student</a>
    <a style="background-color: brown" href="{{route('subject.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Subject</a>
    <a style="background-color: brown" href="{{route('faculty.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Faculty</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Student ID</th>
                <th>Subject ID</th>
                <th>Mark</th>
            </tr>
            </thead>
            <tbody>
            @include('layouts.flash_message')
            <div>@foreach ($result as $r)
                    <tr>
                        <td>{{$r->student_id}}</td>
                        <td>{{$r->subject_id}}</td>
                        <td>{{$r->mark}}</td>
                        <td class="center">
                            {{  Form::open(array('route' => array('result.edit', $r->id), 'method'=>'get')) }}

                            <form>
                                {{ csrf_field() }}
                                {{ method_field('GET') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                </div>

                                {!! Form::close()  !!}
                                {{  Form::open(array('route' => array('result.destroy', $r->id), 'method'=>'post')) }}
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    <input type="submit" onclick="return confirm('Are you sure?')"
                                           class="btn btn-danger" value="Delete">
                                </div>
                            {!! Form::close()  !!}

                        </td>


                    </tr>
                @endforeach
            </div>

            </tbody>
        </table>
    </div>

</div>
<div style="margin-left: auto;margin-right: auto;width: 10%;">
    {{$result->links("pagination::bootstrap-4")}}
</div>
