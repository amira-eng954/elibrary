@extends('admin.layout')

@section('content')


<div class=' container'>
    <h1>edit category</h1>
    <form action='{{url("cats/$cat->id")}}' method="post">
        @csrf
        @method('put')
        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'>Name-Category</label>
            <div class=' col-md-6'>
                <input type='text' name='namecat' class=' form-control mb-3' required value='{{$cat->namecat}}'>
                @error('namecat')
                <div class=' alert alert-danger fw-bold '> {{$message}}</div>
                @enderror
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'>description-Category</label>
            <div class=' col-md-6'>
                <textarea rows="5px" cols="5px" name='body' class=' form-control mb-3' required>{{$cat->body}}</textarea>
                @error('body')
                <div class=' alert alert-danger fw-bold '> {{$message}}</div>
                @enderror
            </div>
        </div>

        <div class='row'>
            <div class=' offset-md-2 col-md-6'>
                <input type='submit' class=' btn btn-primary' value=' edit-category'>
            </div>
        </div>


    </form>

</div>
@endsection