
@extends('admin.layout')
@section('content')


<div class=' container'>
    <h1>All-categories</h1>
    @if(session()->has('suc'))

    <div class=' alert alert-success'>{{session()->get('suc')}}</div>
    @endif
    <table class=' table table-bordered text-center'>
        <tr>
            <th>#id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Show</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>

        @foreach($cats as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->namecat}}</td>
            <td>{{$cat->body}}</td>
            <td><a class='btn btn-success' href='{{url("cats/$cat->id")}}'>show</a></td>
            <td><a class='btn btn-info' href='{{url("cats/edit/$cat->id")}}'>edit</a></td>
            <td>
                <form action='{{url("cats/delete/$cat->id")}}' method='post'>
                    @csrf
                    @method('delete')
                   <button  class='btn btn-danger' >delete</button>
                </form>
                
            </td>
        </tr>
        @endforeach

    </table>

    <a class=' btn btn-primary ' href='{{url("addcat")}}'>add-new-category</a>
</div>
@endsection