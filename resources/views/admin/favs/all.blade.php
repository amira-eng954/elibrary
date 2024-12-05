@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1> All Books</h1>
    @if(session()->has('suc'))
    <div class=' alert alert-success'>{{session()->get('suc')}}</div>

    @endif
    
    <table class=' table table-bordered text-center'>
        <tr>
            <th>#Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
           
            <th>student</th>



        </tr>
        @foreach($loans as $book)
        <tr>
            <td>{{$book->book->id}}</td>
            <?php $xx = $book->book->image ?>
            <td><img src='{{asset("storage/$xx")}}' width="80px" height="80px"></td>
            <td>{{$book->book->title}}</td>
            <td>{{$book->book->desc}}</td>
           <?php
           $aa=$book->user->id;
           ?>
            <td><a href='{{url("users/$aa")}}' class=' btn btn-success'>{{$book->user->name}}</a></td>
           



        </tr>

        @endforeach
    </table>

</div>
@endsection