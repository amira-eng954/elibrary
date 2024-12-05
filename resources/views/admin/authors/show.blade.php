@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1>show Author</h1>
    <div class=' card'>
        <div class=' card-header'> {{$authors->name}}</div>
        <div class=' card-body'>
            <div class='row'>
                <div class=' col-md-3'>
                    <img src='{{asset("storage/$authors->image")}}'>
                </div>
                <div class='offset-md-2 col-md-6'>
                  <ul class='  list-unstyled list-user'>
                   <li ><span> #id:</span> {{$authors->id}}</li>
                    <li><span> name:</span> {{$authors->name}}</li>
                    <li><span> email:</span> {{$authors->email}}</li>
                    <li><span> age:</span> {{$authors->age}}</li>
                    <li><span> address:</span> {{$authors->address}}</li>
                    <li><span> job:</span> {{$authors->job}}</li>
                    <li><span> awards:</span> {{$authors->awards}}</li>
                    <li><span> date:</span> {{$authors->date}}</li>
                  </ul>
                    <a class=' btn btn-success' href='{{url("author/")}}'>back</a></li>
                    <a class=' btn btn-info' href='{{url("author/edit/$authors->id")}}'>edit</a>
                    <a class=' btn btn-danger' href='{{url("author/delete/$authors->id")}}'>delete</a>
                </div>


            </div>

        </div>

    </div>

</div>
@endsection