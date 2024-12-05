@extends('user.layout')

    
         
         
         
    @section('css')
    <link rel='stylesheet' href="{{asset('pro/css/front.css')}}">
    @endsection
          
          @section('body') 
          
       
   
      <div class="container">
      
      
          <div class="row ">
          <h1>show</h1>
               <div class=' col-md-3'>
               <img src='{{asset("storage/$book->image")}}'  alt="" >
               </div>
                    
                  <div class=' offset-md-1 col-md-6'>

                  <h5 class=' fw-bolder text-primary mb-3'>{{$book->title}}</h5>
            
                  <p class='lead mb-2'> {{$book->desc}}</p>
                    <ul class=' list-unstyled list-user'>    
                 <li class='  md-3 fw-bold'>N.pages : <span class=' text-success fw-bold'>{{$book->pages}}</span></li>
                 <li  class=' md-3 fw-bold'>Language : <span class=' text-success fw-bold'>{{$book->Language}}</span></li>
                 <li  class='  md-3 fw-bold'>Category : <span class=' text-success fw-bold'><a  href='{{url("showcat/$book->cat_id")}}'>{{$book->cat->namecat}}</a></span></li>
                 <li  class=' md-3 fw-bold'>Author : <span class=' text-success fw-bold'>{{$book->author->name}}</span></li>
                 <li  class='  md-3 fw-bold'>Publisher : <span class=' text-success fw-bold'>{{$book->publisher->name}}</span></li>
                 <li  class='   md-3 fw-bold'>Date of publish book : <span class=' text-success fw-bold'>{{$book->date}}</span></li>
                 <li> <a href='{{url("addborrow/$book->id")}}'  class=' btn btn-primary'>borrow Book</a>
                 
                 <a href='{{url("addfav/$book->id")}}' class=' btn btn-success'> <i class=" fa-sharp fa-regular fa-heart "></i> add-favourate</a>
                
                </li>
                    </ul>
                  </div>
  
                    

      
        </div>
        </div>
     @endsection   
      
     

         
          
   
         
         
          
              
      
          
        
     


        
