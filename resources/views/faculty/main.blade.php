<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container">
    <a href="{{route('faculty.create')}}" class="btn btn-success btn-add" id="addst" data-target="#modal-add"
       data-toggle="modal">Add</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tên Khoa</th>
            </tr>
            </thead>
            <tbody>
            <div>@foreach ($facu as $faculty)
                    <tr>
                        <td>{{$faculty->id}}</td>
                        <td>{{$faculty->name}}</td>
                        <td>
                        <td class="center">
                            <form method="GET" action="{{route('faculty.edit',$faculty->id)}}">
                                <form>
                                    {{--                            {{ csrf_field() }}--}}
                                    {{--                            {{ method_field('GET') }}--}}
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Edit">
                                    </div>
                                </form>
                                <form method="POST" action="{{route('faculty.destroy',$faculty->id)}}">
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
    {{$facu->links("pagination::bootstrap-4")}}
</div>
</body>
</html>
