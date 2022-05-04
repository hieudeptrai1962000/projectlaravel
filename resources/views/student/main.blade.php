@extends('layouts/layout')
<div class="container">
    <h1>Student</h1>
    <a href="{{route('student.create')}}" class="btn btn-success btn-add" id="addst" data-target="#modal-add"
       data-toggle="modal">Add</a>
    <a style="background-color: brown" href="{{route('faculty.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Faculty</a>
    <a style="background-color: brown" href="{{route('subject.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Subject</a>
    <a style="background-color: brown" href="{{route('result.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Result</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Avatar</th>
                <th>Faculty ID</th>
            </tr>
            </thead>
            <tbody>
            @include('layouts.flash_message')
            <div>@foreach ($student as $s)
                    <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->full_name}}</td>
                        <td>{{$s->email}}</td>
                        <td>{{$s->birthday}}</td>
                        <td>
                            <?php
                            if ($s->gender == 0) {
                                echo 'Nam';
                            } else {
                                echo 'Nữ';
                            }
                            ?>
                        </td>
                        <td>{{$s->phone_number}}</td>
                        <td><img width="auto" height="150px" src="{{asset(''.$s->image)}}"></td>
                        <td>{{$s->faculty_id}}</td>
                        <td class="center">
                            {{  Form::open(array('route' => array('student.edit', $s->id), 'method'=>'get')) }}

                            <form>
                                {{ csrf_field() }}
                                {{ method_field('GET') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                </div>

                                {!! Form::close()  !!}
                                {{  Form::open(array('route' => array('student.destroy', $s->id), 'method'=>'post')) }}
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
    {{$student->links("pagination::bootstrap-4")}}
</div>
