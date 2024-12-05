@extends('admin.layout')
@section('content')


<div class=' container'>
  <h1> ALL Users </h1>
  @if(session()->has('suc'))
  <div class=' alert alert-success'>
    {{session()->get('suc')}}
  </div>
  @endif
  <table class=' table table-bordered text-center'>
    <tr>
      <th>#ID</th>
      <th>Name </th>
      <th>Email</th>

      <th>show</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>


    @foreach($data as $ss)
    <tr>
      <td>{{$ss->id}}</td>
      <td> {{$ss->name}}</td>
      <td> {{$ss->email}}</td>
      <td>
        <a href="{{url("users/$ss->id")}}" class=' btn btn-success'>show</a>
      </td>
      <td>
        <a href="{{url("users/edit/$ss->id")}}" class=' btn btn-info'>edit</a>
      </td>
      <td>


        <form action="{{url("users/delete/$ss->id")}}" method='post'>
          @csrf
          @method('delete')

          <input type='submit' class=' btn btn-danger d-inline' value="delete">
        </form>

      </td>
    </tr>
    @endforeach

   
    <!-- <tr>
      <td colspan="4">No Category Found</td>
    </tr> -->
  
  </table>
  <a href="{{url('adduser')}}" class=" btn btn-primary">add new member</a>
</div>
@endsection