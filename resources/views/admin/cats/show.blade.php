@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1>show category</h1>
    <div class=' card'>
        <div class=' card-header'> {{$cat->namecat}}</div>
        <div class=' card-body'>
            <div class='row'>
                
                <div class='offset-md-3 col-md-6'>
                  <ul class='  list-unstyled list-user'>
                   <li ><span> #id:</span> {{$cat->id}}</li>
                    <li><span> name:</span> {{$cat->namecat}}</li>
                    <li><span> email:</span> {{$cat->body}}</li>
                    
                  </ul>
                    <a class=' btn btn-success' href='{{url("cats/")}}'>back</a></li>
                    <a class='btn btn-info' href='{{url("cats/edit/$cat->id")}}'>edit</a>
                    <form action='{{url("cats/delete/$cat->id")}}' method='post' class=' d-inline'>
                    @csrf
                    @method('delete')
                   <!-- <button  class='btn btn-danger mt-3' >delete</button> -->
                   <input type='submit'class=' btn btn-danger' value="delete"> 
                </form>
                </div>


            </div>

        </div>

    </div>

</div>
@endsection