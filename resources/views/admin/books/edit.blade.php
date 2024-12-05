@extends('admin.layout')

@section('content')

<div class=' container'>
  <h1> Edit Book</h1>

 

  <form action='{{url("books/$book->id")}}' method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Title Book</label>
      <div class=' col-md-6'>
        <input type='text' value='{{$book->title}}' name='title' class=' form-control mb-3'>
        @error('title')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Description</label>
      <div class=' col-md-6'>
        <textarea  rows='5px' cols='5px' name='desc' class=' form-control mb-3'>{{$book->desc}}</textarea>
        @error('desc')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>N.Pages</label>
      <div class=' col-md-6'>
      <input type='text' name='pages' class=' form-control mb-3'  value='{{$book->pages}}' required >
      @error('pages')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Language</label>
      <div class=' col-md-6'>
      <input type='text' name='Language' class=' form-control mb-3'  value='{{$book->Language}}' required >
      @error('language')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Author</label>
      <div class=' col-md-6'>
        <select name='author_id' class=' form-control mb-3'>

          @foreach($authors as $author)
          <option
            @if($book->author_id == $author->id)
            selected
            @endif
            value='{{$author->id}}'>{{$author->name}}</option>
          @endforeach


        </select>
        @error('author_id')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Publisher</label>
      <div class=' col-md-6'>
        <select name='publisher_id' class=' form-control mb-3'>

          @foreach($publisher as $author)
          <option
            @if($book->publisher_id == $author->id)
            selected
            @endif
            value='{{$author->id}}'>{{$author->name}}
          </option>
          @endforeach


        </select>
        @error('publisher_id')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Category</label>
      <div class=' col-md-6'>
        <select name='cat_id' class=' form-control mb-3'>
          @foreach($cats as $cat)
          <option

            @if($book->cat_id == $author->id)
            selected
            @endif
            value='{{$cat->id}}'>{{$cat->namecat}}</option>
          @endforeach
          <option></option>

        </select>
        @error('cat_id')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    <div class='row'>
      <label class='col-md-2  form-label col-form-label fw-bold'>Image Book</label>
      <div class=' col-md-6'>
        <input type='file' name='image' class=' form-control mb-3'>
        <img src='{{asset("storage/$book->image")}}' width="100px" height="100px">
        @error('image')
        <div class=' alert alert-danger fw-bold '> {{$message}}</div>
        @enderror
      </div>
    </div>

    <div class='row'>

      <div class=' offset-md-2 col-md-6'>
        <input type='submit' class=' btn btn-primary mt-3' value="update-book">
      </div>
    </div>



  </form>
</div>
@endsection