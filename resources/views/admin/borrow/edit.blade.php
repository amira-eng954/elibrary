@extends('admin.layout')
@section('css')


@endsection
@section('content')
<div class=' container'>
  <h1 class='  m-5 text-center'>edit member</h1>
 
  <a class=' btn btn-success mb-3' href='{{url("Borrwingbooks/")}}'>back</a>
  <form class=" text-center " action='{{url("Borrwingbooks/$book->id")}}' method="post">
    @csrf
    @method('put')

    <div class=' row'>
      <lable class=' col-md-2 col-form-label fw-bold '>Date-start</lable>
      <div class=' col-md-6'>
        <input type='date' name='start' value="{{$book->start}}" class=' form-control-lg  form-control  mb-3' >
        @error('start')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    <div class=' row'>
      <lable class=' col-md-2 col-form-label fw-bold '>Date-end</lable>
      <div class=' col-md-6'>
        <input type='date' name='end' value="{{$book->end}}" class=' form-control-lg  form-control  mb-3' >
        @error('end')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    
    

    <div class=' row'>

      <div class=' offset-md-2 col-md-6'>
        <input type='submit' class=' btn btn-primary mt-4' value="update borrow book">
      </div>
    </div>




  </form>
</div>
@endsection