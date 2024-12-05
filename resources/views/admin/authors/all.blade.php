
@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1>All-Authors</h1>

    @if(session()->has('suc'))
  <div class=' alert alert-success'>  {{session()->get('suc')}}</div>
    @endif
    <table class='table table-bordered text-center'>
        <tr>
            <th>#ID</th>
            <th>image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Address</th>
            <th>Job</th>
            <th>Awards</th>
            <th>date-add</th>
            <th>control</th>
            <th>delete</th>
        </tr>

        @foreach($authors as $author)
           <tr>
            <td>{{$author->id}}</td>
            <td><img src='{{asset("storage/$author->image")}}' width="80px" height="80px"></td>
            <td>{{$author->name}}</td>
            <td>{{$author->email}}</td>
            <td>{{$author->age}}</td>
            <td>{{$author->address}}</td>
            <td>{{$author->job}}</td>
            <td>{{$author->awards}}</td>
            <td>{{$author->date}}</td>
            <td>
                <a class=' btn btn-success' href='{{url("author/$author->id")}}'>show</a>
                <a class=' btn btn-info' href='{{url("author/edit/$author->id")}}'>edit</a>
                <?php
                 if($author->groupId==0){
                echo '<a class="btn  btn-secondary"  href="author/approve/'.$author->id.'">Approve</a>';
                 }
                ?>
                
            </td>

            <td>
            <form action='{{url("author/delete/$author->id")}}' method='post'>
                 @csrf
                 @method('delete')
       
                   <input type='submit'class=' btn btn-danger' value="delete"> 
           </form>
            </td>
           </tr>
        @endforeach

    </table>
<a class='btn btn-primary' href='{{url("addauthor")}}'>create-author</a>
</div>
@endsection