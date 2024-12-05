@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1> All Books</h1>
    @if(session()->has('suc'))
     <div class=' alert alert-success'>{{session()->get('suc')}}</div>

    @endif
<a class=' btn btn-primary mb-3' href='{{url("addbook")}}'>Add-new-book</a>
    <table class=' table table-bordered text-center'>
        <tr>
            <th>#Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>N.pages</th>
            <th>Lang</th>
            <th>Date-publish</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>category</th>
            <th>control</th>
            <th>Delete</th>
            
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td><img src='{{asset("storage/$book->image")}}' width="80px" height="80px"></td>
            <td>{{$book->title}}</td>
            <td>{{$book->desc}}</td>
            <td>{{$book->pages}}</td>
            <td>{{$book->Language}}</td>
            <td>{{$book->date}}</td>
            <td>{{$book->author->name}}</td>
            <td>{{$book->publisher->name}}</td>
            <td>{{$book->cat->namecat}}</td>
          
            <td>
                <a class=' btn btn-success mb-1' href='{{url("books/$book->id")}}'>Show</a>
                <a class=' btn btn-info mb-1'  href='{{url("books/edit/$book->id")}}'>Edit</a>
                <?php
                 if($book->status==0){
                echo '<a class="btn  btn-secondary mb-1"  href="books/approve/'.$book->id.'">Approve</a>';
                 }
                ?>
               
            </td>
            <td>
            <form action='{{url("books/delete/$book->id")}}' method='post'>
                 @csrf
                 @method('delete')
       
                   <input type='submit'class=' btn btn-danger' value="delete"> 
           </form>
            </td>
        </tr>

        @endforeach
    </table>

</div>
@endsection