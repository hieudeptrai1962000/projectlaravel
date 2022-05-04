@extends('layouts/layout')
<div class="container">
    <h1>Subject</h1>
    <a href="{{route('subject.create')}}" class="btn btn-success btn-add" id="addst" data-target="#modal-add"
       data-toggle="modal">Add</a>
    <a style="background-color: brown" href="{{route('student.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Student</a>
    <a style="background-color: brown" href="{{route('faculty.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Faculty</a>
    <a style="background-color: brown" href="{{route('result.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Result</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Subject ID</th>
                <th>Subject</th>
            </tr>
            </thead>
            <tbody>
            @include('layouts.flash_message')
            <div>@foreach ($subject as $s)
                    <tr>
                        <td>{{$s->id}}</td>
                        <td>{{$s->name}}</td>
                        <td class="center">
                            {{  Form::open(array('route' => array('subject.edit', $s->id), 'method'=>'get')) }}

                            <form>
                                {{ csrf_field() }}
                                {{ method_field('GET') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                </div>

                                {!! Form::close()  !!}
                                {{  Form::open(array('route' => array('subject.destroy', $s->id), 'method'=>'post')) }}
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
    {{$subject->links("pagination::bootstrap-4")}}
</div>
