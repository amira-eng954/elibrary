@extends('user.layout')

    
         
         
          
          @section('body') 
          
          <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4 class=' mt-5'>Best Offer</h4>
            <h2  class=' text-black'>Online Library</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <!-- <h4>Flash Deals</h4>
            <h2>Get your best products</h2> -->
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <!-- <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2> -->
          </div>
        </div>
      </div>
    </div>

    <form action='{{url("search")}}' method="get" class=' m-5'>
      <input type='text' name='word' class='  w-50' placeholder="search by title.......">
      <!-- <input type=' submit' class=' btn btn-dark'  value='search'> -->
       <button  class=' btn btn-dark'>search</button>

    </form>

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Avilable Books</h2>
              <a href="{{url('redirect')}}">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          </div>

      
          <div class="row grid">
                @foreach($books as $data)
                    <div class="col-lg-4 col-md-4 all des">
                    <a href='{{url("showbook/$data->id")}}'><img src='{{asset("storage/$data->image")}}' class=' m-auto'  alt="" ></a>
                      <div class="product-item">
                      
                       
                        <div class="down-content position-relative">
                       <a href='{{url("addfav/$data->id")}}'> <i class=" amiraali position-absolute  end-0 top-10  fa-sharp fa-regular fa-heart fa-xl"></i></a>
                          <a href='{{url("showbook/$data->id")}}'><h4>{{$data->title}}</h4></a>
                          <h6></h6>
                          <p>{{$data->desc}}</p>
                          <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                          </ul>
                          <span>date ({{$data->date}})</span>
                          
                        </div>
                        <a href='{{url("addborrow/$data->id")}}'  class='mb-1 ms-3 btn btn-primary'>borrow Book</a>
                      </div>
                    </div>
                    @endforeach

        </div>
        </div>
        </div>
     @endsection   
      
     

         
          
   
         
         
          
              
      
          
        
     


        
