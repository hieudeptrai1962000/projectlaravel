@extends('layouts/layout')
<div class="container">
    <a href="{{route('faculty.create')}}" class="btn btn-success btn-add" id="addst" data-target="#modal-add"
       data-toggle="modal">Add</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Mã Môn Học</th>
                <th>Tên Khoa</th>
            </tr>
            </thead>
            <tbody>
                @include('layouts.flash_message')
            <div>@foreach ($faculty as $f)
                    <tr>
                        <td>{{$f->id}}</td>
                        <td>{{$f->name}}</td>
                        <td class="center">
                            <form method="GET" action="{{route('faculty.edit',$f->id)}}">
                                <form>
                                                                {{ csrf_field() }}
                                                                {{ method_field('GET') }}
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Edit">
                                    </div>
                                </form>
                                <form method="POST" onclick="return confirm('Are you sure?')" action="{{route('faculty.destroy',$f->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </div>
                                </form>

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
