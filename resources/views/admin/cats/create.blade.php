@extends('admin.layout')

@section('content')


<div class=' container'>
    <h1>Insert new category</h1>
    @if ($errors->any())

  <ul class=" list-unstyled text-center fw-bold">
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger w-50 m-auto">
      <li>{{ $error }}</li>
    </div>
    @endforeach
  </ul>

  @endif
    <form action='{{url("cats")}}' method="post">
        @csrf
        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'>Name-Category</label>
            <div class=' col-md-6'>
                <input type='text' name='namecat' class=' form-control mb-3' required placeholder="enter name of category">
            </div>
        </div>

        <div class='row'>
            <label class=' col-md-2 form-label col-form-label-lg fw-bold'>description-Category</label>
            <div class=' col-md-6'>
                <textarea rows="5px" cols="5px" name='body' class=' form-control mb-3' required placeholder="enter description of category"></textarea>
            </div>
        </div>

        <div class='row'>
            <div class=' offset-md-2 col-md-6'>
                <input type='submit' class=' btn btn-primary' value=' add-category'>
            </div>
        </div>


    </form>

</div>
@endsection