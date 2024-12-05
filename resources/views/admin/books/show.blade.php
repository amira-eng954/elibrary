@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1>show book</h1>
    <div class=' card'>
        <div class=' card-header'> {{$book->title}}</div>
        <div class=' card-body'>
            <div class='row'>
                <div class=' col-md-3'>
                    
                    <img src='{{asset("storage/$book->image")}}'>
                </div>
                <div class='offset-md-2 col-md-6'>
                  <ul class='  list-unstyled list-user'>
                   <li ><span> #id:</span> {{$book->id}}</li>
                    <li><span> title:</span> {{$book->title}}</li>
                    <li><span> Descrition:</span> {{$book->desc}}</li>
                    <li><span> Author:</span> {{$book->author->name}}</li>
                    <li><span> Category:</span> {{$book->cat->namecat}}</li>
                    <li><span> date-publisher:</span> {{$book->date}}</li>
                  </ul>
                    <a class=' btn btn-success' href='{{url("books/")}}'>back</a></li>
                    <a class=' btn btn-info' href='{{url("books/edit/$book->id")}}'>edit</a>
                    <form action='{{url("books/delete/$book->id")}}' method='post' class=' d-inline'>
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