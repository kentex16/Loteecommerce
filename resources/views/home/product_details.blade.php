<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Lote.ph</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         
        @include('home.header')
  



      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto;width:50%; padding:30px;">
           <div class="img-box">
              <img src="product/{{$product->image}}" alt="">
           </div>
           <div class="detail-box">
              <h5 style="font-size:30px;">
                <strong>{{$product->title}}</strong>
              </h5>
              <h5 style="font-size:30px;">Location:
                <strong>{{$product->location}}</strong>
              </h5>
             
              
              <p>Seller: {{ $product->seller->name }}</p>
             
              <h6 style="color:blue;">
                Lot Area:
                
                {{$product->lot_area}} SQM
              </h6>
              <h6 style="color:blue;">
                Price:
               
                ₱{{$product->price}}
                <h6>
                  <strong>  Description:
                  
                    {{$product->description}} </strong>
              </h6>
              <h6>
                <strong> Category:
               
                {{$product->category}} </strong>
          </h6>
          
          <h6 style="padding-bottom:20px;">
           <strong>Property Type:
            
            {{$product->property_type}}</strong> 
      </h6>
      <a href="{{ url('/inquiry_page') }}" class="btn btn-primary" id="inquire-button">
         Inquire
     </a>
     
     
     
          
           </div>
        </div>
     </div>
    </div>

      @include ('home.footer')
      
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>