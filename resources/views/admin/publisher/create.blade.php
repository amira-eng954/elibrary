@extends('admin.layout')

@section('content')

<div class=' container'>
    <h1>add Publisher</h1>

    @if ($errors->any())

    <ul class=" list-unstyled text-center fw-bold">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger w-50 m-auto">
            <li>{{ $error }}</li>
        </div>
        @endforeach
    </ul>

    @endif
    <form action='{{url("publisher")}}' method="post" enctype="multipart/form-data">
        @csrf
        <div class='row'>
            <label class=' col-sm-2 form-label col-form-label-lg fw-bold'> Name-publisher</label>
            <div class=' col-md-6  '>
                <input type='text' name='name' class='form-control  mb-3' placeholder="enter name publisher" required>
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Email-publisher</label>
            <div class=' col-md-6 '>
                <input name='email' type='email' class='form-control  mb-3' placeholder="enter email publisher" required>
            </div>
        </div>

        

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Address-publisher </label>
            <div class=' col-md-6  '>
                <input name='address' type='text' class='form-control  mb-3' placeholder="enter address publisher" required>
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Job-publisher</label>
            <div class=' col-md-6'>
                <input name='job' type='text' class='form-control  mb-3' placeholder="enter job publisher" required>
            </div>
        </div>

       

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'> Image-publisher</label>
            <div class=' col-md-6 '>
                <input name='image' type='file' class='form-control  mb-3' required>
            </div>
        </div>

        <div class='row'>

            <div class=' offset-md-2 col-md-6 '>
                <input type='submit' class='btn btn-primary  mb-3' value='add-publisher'>
            </div>
        </div>




    </form>
</div>
@endsection