@extends('admin.layout')

@section('content')

<div class=' container'>
  <h1> add new Book</h1>
  @if ($errors->any())

  <ul class=" list-unstyled text-center fw-bold">
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger w-50 m-auto">
      <li>{{ $error }}</li>
    </div>
    @endforeach
  </ul>

  @endif

  <form action='{{url("books")}}' method="post" enctype="multipart/form-data">
    @csrf
    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Title Book</label>
      <div class=' col-md-6'>
        <input type='text' name='title' class=' form-control mb-3' required placeholder="Enter title book ">
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Description</label>
      <div class=' col-md-6'>
        <textarea type='text' rows='5px' cols='5px' name='desc' class=' form-control mb-3' required placeholder="Enter description book "></textarea>
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>N.Pages</label>
      <div class=' col-md-6'>
      <input type='text' name='pages' class=' form-control mb-3' required placeholder="Enter numbers of pages book ">
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Language</label>
      <div class=' col-md-6'>
      <input type='text' name='Language' class=' form-control mb-3' required placeholder="Enter language book ">
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Author</label>
      <div class=' col-md-6'>
        <select name='author_id' class=' form-control mb-3'>

          @foreach($authors as $author)
          <option value='{{$author->id}}'>{{$author->name}}</option>
          @endforeach
       

        </select>
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Category</label>
      <div class=' col-md-6'>
        <select name='cat_id' class=' form-control mb-3'>
          @foreach($cats as $cat)
          <option value='{{$cat->id}}'>{{$cat->namecat}}</option>
          @endforeach


        </select>
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Publisher</label>
      <div class=' col-md-6'>
        <select name='publisher_id' class=' form-control mb-3'>
          @foreach($publisher as $pub)
          <option value='{{$pub->id}}'>{{$pub->name}}</option>
          @endforeach

          
          

        </select>
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Image Book</label>
      <div class=' col-md-6'>
        <input type='file' name='image' class=' form-control mb-3'>
      </div>
    </div>

    <div class='row'>

      <div class=' offset-md-2 col-md-6'>
        <input type='submit' class=' btn btn-primary' value="add-book">
      </div>
    </div>



  </form>
</div>
@endsection