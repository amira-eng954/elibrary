@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1>Edit Author</h1>
    <form action='{{url("author/$authors->id")}}' method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class='row'>
            <label class=' col-sm-2 form-label col-form-label-lg fw-bold'> Name-Author</label>
            <div class=' col-md-6  '>
                <input type='text' name='name' class='form-control  mb-3' value="{{$authors->name}}" required>
                @error('name')
                <div class=' alert alert-danger fw-bold '> {{$message}}</div>
                @enderror
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Email-Author</label>
            <div class=' col-md-6 '>
                <input name='email' type='email' class='form-control  mb-3' value="{{$authors->email}}" required>
                @error('email')
                <div class=' alert alert-danger fw-bold '> {{$message}}</div>
                @enderror
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Age-Author</label>
            <div class=' col-md-6  '>
                <input name='age' type='number' class='form-control  mb-3' value="{{$authors->age}}" required>
                @error('age')
                <div class=' alert alert-danger fw-bold '> {{$message}}</div>
                @enderror
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Address-Author </label>
            <div class=' col-md-6  '>
                <input name='address' type='text' class='form-control  mb-3' value="{{$authors->address}}" >
                @error('address')
                <div class=' alert alert-danger fw-bold '> {{$message}}</div>
                @enderror
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Job-Author </label>
            <div class=' col-md-6  '>
                <input name='job' type='text' class='form-control  mb-3' value="{{$authors->job}}" >
                @error('address')
                <div class=' alert alert-danger fw-bold '> {{$message}}</div>
                @enderror
            </div>
        </div>




        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Awards-Author</label>
            <div class=' col-md-6'>
                <input name='awards' type='text' class='form-control  mb-3' value="{{$authors->awards}}" required>
                @error('awards')
                <div class=' alert alert-danger fw-bold '> {{$message}}</div>
                @enderror
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Image-Author</label>
            <div class=' col-md-6 '>
                <input type='file' name='image' class='form-control  mb-3'>
                <img src='{{asset("storage/$authors->image")}}' width="100px" height="100px">
                @error('image')
                <div class=' alert alert-danger fw-bold '> {{$message}}</div>
                @enderror

            </div>
        </div>

        <div class='row'>

            <div class=' offset-md-2 col-md-6 '>
                <input type='submit' class='btn btn-primary mt-3 mb-3' value='update-author'>
            </div>
        </div>




    </form>
</div>
@endsection