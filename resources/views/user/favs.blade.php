
@extends('user.layout')


@section('css')
<link rel='stylesheet' href="{{asset('pro/css/front.css')}}">
@endsection



@section('body')
<div class=' container'>

  <div class=' row'>
    <h1 class=''>All favourate Books </h1>
  </div>

  @if(session()->has('suc'))
  <div class=' alert alert-success'>{{session()->get('suc')}}</div>

  @endif
  <div class="row grid">

  <table class=' table table-bordered text-center  '>
    <tr>
      <th>#Id</th>
      <th>Image</th>
      <th>Title</th>
      <th>Description</th>

      <th>delete</th>



    </tr>

    @foreach($favs as $book)


    <tr>
      <td>{{$book->book->id}}</td>
      <?php $xx = $book->book->image ?>
      <td><img src='{{asset("storage/$xx")}}' width="120px" height="120px"></td>
      <td>{{$book->book->title}}</td>
      <td>{{$book->book->desc}}</td>
      <?php
      $aa = $book->user->id;
      ?>
      <td><a href='{{url("fav/delete/$book->id")}}' class=' btn btn-danger'>delete from favourate</a></td>




    </tr>


    
    @endforeach
    </table>

  </div>
</div>
@endsection