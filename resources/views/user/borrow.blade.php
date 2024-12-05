      @extends('user.layout')

      @section('css')
      <link rel='stylesheet' href="{{asset('pro/css/front.css')}}">
      @endsection



      @section('body')
      <div class=' container'>

          <div class=' row'>
              <h1 class=''>All borrowing Books </h1>
          </div>



          @if(session()->has('suc'))
          <div class=' alert alert-success'>{{session()->get('suc')}}</div>

          @endif

         
      @foreach($loans as $book)
      <div class='row'>
      <div class=' col-md-3'>
          <?php $xx = $book->book->image ?>
          <img src='{{asset("storage/$xx")}}' width="200px" height="200px" class=' border rounded-circle'>
      </div>

      <div class=' offset-md-1 col-md-6'>

          <h5 class=' fw-bolder text-primary mb-3'>{{$book->book->title}}</h5>

          <p class='lead mb-2'>{{$book->book->desc}}</p>
          <ul class=' list-unstyled list-user'>

              <li class='   md-3 fw-bold'>Date start : <span class=' text-success fw-bold'>{{$book->start}}</span></li>
              <li class='   md-3 fw-bold'>Date start : <span class=' text-success fw-bold'>{{$book->start}}</span></li>
              <li>
                  <div><a href='{{url("borrow/delete/$book->id")}}' class=' btn btn-success'>Recovery</a></div>
              </li>
          </ul>
      </div>
      </div>
      <hr class=' mt-2 mb-2'>
      @endforeach




      </div>
    
      @endsection