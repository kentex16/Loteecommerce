<!DOCTYPE html>
<html>
   <head>
    <style>
        .small-button{
            font-size: 10px;
        }
        .select-button{
            margin-left: 10px;
            padding: 4px 28px;
        }
    </style>
      <!-- Basic -->
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
         <!-- header section strats -->
      <header class="header_section">
          <div class="container">
             <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{url('/')}}"><img width="280" src="images/logo.png" alt="#" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav">
                      <li class="nav-item active">
                         <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                      </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                         <ul class="dropdown-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="testimonial.html">Testimonial</a></li>
                         </ul>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link" href="{{url('/view_seller')}}">SELL</a>
                      </li>
                      <li class="nav-item">
                         <a class="nav-link" href="blog_list.html">Blog</a>
                      </li>
                      <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Message</a>
                        </li>
                        <li class="nav-item">
                            <form class="access-chatify-form" action="http://127.0.0.1:8000/chatify" method="GET">
                                <button type="submit" class="nav-link">Chat</button>
                            </form>
                        </li>
                    </ul>
                      <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                     </form>
      
                     @if (Route::has('login'))
      
                     @auth
      
                     <x-app-layout>
      
                     </x-app-layout>
      
                     <form action="{{ route('update.user.role') }}" method="POST">
                        @csrf
                        <select class="select-button" name="role" id="role">
                            @if (Auth::user()->role === 'buyer')
                                <option value="buyer" selected disabled>Buyer</option>
                                <option value="seller">Seller</option>
                            @elseif (Auth::user()->role === 'seller')
                                <option value="buyer">Buyer</option>
                                <option value="seller" selected disabled>Seller</option>
                            @endif
                        </select>
                        <button class="small-button" type="submit">Update Role</button>
                    </form>
                    
      
                    
                    <div id="dialog" style="display: none;">
                        <p>Please re-login for becoming a buyer</p>
                    </div>
                    
      
                     @else
                      <li class="nav-item">
                        <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                     </li>
                     <li class="nav-item">
                        <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                     </li>
                     @endauth
                      @endif
                    
                   </ul>
                   
                </div>
             </nav>
          </div>
       </header>
         <!-- end header section -->
         <!-- slider section -->
         @include ('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
   
      <!-- end product section -->

      <!-- subscribe section -->
      @include ('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include ('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include ('home.footer')
      <!-- footer end -->
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