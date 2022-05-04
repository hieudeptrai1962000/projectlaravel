@extends('layouts/layout')
<div class="container">
    <h1>Faculty</h1>
    <a href="{{route('faculty.create')}}" class="btn btn-success btn-add" id="addst" data-target="#modal-add"
       data-toggle="modal">Add</a>
    <a style="background-color: brown" href="{{route('student.index')}}" class="btn btn-success btn-add" id="addst"
       data-target="#modal-add"
       data-toggle="modal">Student</a>
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
                <th>Faculty ID</th>
                <th>Faculty Name</th>
            </tr>
            </thead>
            <tbody>
            @include('layouts.flash_message')
            <div>@foreach ($faculty as $f)
                    <tr>
                        <td>{{$f->id}}</td>
                        <td>{{$f->name}}</td>
                        <td class="center">
                            {{  Form::open(array('route' => array('faculty.edit', $f->id), 'method'=>'get')) }}

                            <form>
                                {{ csrf_field() }}
                                {{ method_field('GET') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Edit">
                                </div>

                                {!! Form::close()  !!}
                                {{  Form::open(array('route' => array('faculty.destroy', $f->id), 'method'=>'post')) }}
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
    {{$faculty->links("pagination::bootstrap-4")}}
</div>
