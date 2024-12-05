@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1>add author</h1>

    @if ($errors->any())

    <ul class=" list-unstyled text-center fw-bold">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger w-50 m-auto">
            <li>{{ $error }}</li>
        </div>
        @endforeach
    </ul>

    @endif
    <form action='{{url("author")}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class='row'>
            <label class=' col-sm-2 form-label col-form-label-lg fw-bold'> Name-Author</label>
            <div class=' col-md-6  '>
                <input type='text' name='name' class='form-control  mb-3' placeholder="enter name author" required>
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Email-Author</label>
            <div class=' col-md-6 '>
                <input name='email' type='email' class='form-control  mb-3' placeholder="enter email author" required>
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Age-Author</label>
            <div class=' col-md-6  '>
                <input name='age' type='number' class='form-control  mb-3' placeholder="enter age author" required>
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Address-Author </label>
            <div class=' col-md-6  '>
                <input name='address' type='text' class='form-control  mb-3' placeholder="enter address author" required>
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Job-Author</label>
            <div class=' col-md-6'>
                <input name='job' type='text' class='form-control  mb-3' placeholder="enter job author" required>
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Awards-Author</label>
            <div class=' col-md-6'>
                <input name='awards' type='text' class='form-control  mb-3' placeholder="enter awards author" required>
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Image-Author</label>
            <div class=' col-md-6 '>
                <input name='image' type='file' class='form-control  mb-3' required>
            </div>
        </div>

        <div class='row'>

            <div class=' offset-md-2 col-md-6 '>
                <input type='submit' class='btn btn-primary  mb-3' value='add-author'>
            </div>
        </div>




    </form>
</div>
@endsection