



@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1>show Author</h1>
    <div class=' card'>
        <div class=' card-header'> show  {{$data->name}}</div>
        <div class=' card-body'>
            <div class='row'>
                
                <div class='offset-md-3 col-md-6'>
                  <ul class='  list-unstyled list-user'>
                   
                     <li> <span> #ID :</span>{{$data->id}}</li>
                     <li>   <span> name :</span> {{$data->name}}</li>
                     <li>  <span> email :</span>{{$data->email}}</li>
                  </ul>
                    <a class=' btn btn-success' href='{{url("users/")}}'>back</a>
                    <a class='btn btn-info' href='{{url("users/edit/$data->id")}}'>edit</a>
                    <form action='{{url("users/delete/$data->id")}}' method='post' class=' d-inline'>
                    @csrf
                    @method('delete')
                    <input type='submit'class=' btn btn-danger' value="delete"> 
                </form>
                </div>


            </div>

        </div>

    </div>

</div>
@endsection