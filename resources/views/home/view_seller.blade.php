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
             .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color:black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 300px;
        }
        .div_design{
            padding-bottom:20px;
        }
        .form-container {
        text-align: center; 
        max-width: 600px; 
        margin: 0 auto; 
        padding: 20px; 
        background-color: #f7f7f7; 
        border: 1px solid #ddd; 
        border-radius: 10px; 
    }

    .form-container label,
    .form-container input,
    .form-container select,
    .form-container button {
        display: block;
        margin-bottom: 10px;
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
                           <a class="nav-link" href="{{url('/view_seller')}}">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="blog_list.html">Blog</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        <form class="form-inline">
                          <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                          <i class="fa fa-search" aria-hidden="true"></i>
                          </button>
                       </form>
        
                       @if (Route::has('login'))
        
                       @auth
        
                       <x-app-layout>
        
                       </x-app-layout>
        
                       <form method="POST" action="{{ url('redirectToRole') }}" id="roleForm">
                        @csrf
                        <select class="select-button" name="role" id="role">
                            <option value="seller" {{ old('role') === 'seller' ? 'selected' : '' }}>Seller</option>
                        </select>
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
     
         <!-- end slider section -->
      
      <!-- why section -->
      <div class="form-container">
      <div class="main-panel">
         <div class="content-wrapper">
             @if(session()->has('message'))
             
             <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true"> x</button>
                 {{session()->get('message')}}
             </div>
                 @endif
             <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                 @csrf
             <div class="div_center">
                 <h1 class="font_size"> Products</h1>

                 
                 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                 <div class="div_design">
                 <label for="">Name:</label>
                 <input class="text_color" type="text" name="title" placeholder="Write a title" required="">
             </div>
             <div class="div_design">
                 <label for="">Description:</label>
                 <input class="text_color" type="text" name="description" placeholder="Write a description" required="">
             </div>
             
             <div class="div_design">
                 <label for="">Price:</label>
                 <input class="text_color" type="number" name="price" placeholder="Write the price" required="">
             </div>
             
             <div class="div_design">
                 <label for="">Location:</label>
                 <input class="text_color" type="text" name="location" placeholder="Write the location" required="">
             </div>
             
             <div class="div_design">
                 <label for="">Category:</label>
                 <select class="text_color" name="category" id="" required="">
                     <option value =" " selected= " ">Add a Category</option>
                     @foreach ($category as $category)
                     <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                     @endforeach
                 </select>
             </div>
             
             <div class="div_design">
                 <label for="">Property Type:</label>
                 <input class="text_color" type="text" name="property_type" placeholder="Write a property type" required="">
             </div>
             <div class="div_design">
                 <label for="">Lot Area:</label>
                 <input class="text_color" type="text" name="lot_area" placeholder="Write a lot area" required="">
             </div>
             <div class="div_design">
                 <label for="">Product Image:</label>
                 <input type="file" name="image" required="">
             </div>

             <div class="div_design">
                 
                 <input type="submit" value="Add Product" class="btn btn-primary">
             </div>
         </form>
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
      <script>
         document.getElementById('role').addEventListener('click', function () {
             window.alert('Please re-login for becoming a buyer');
         });
     
         document.getElementById('role').addEventListener('change', function () {
             if (this.value === 'seller') {
                 document.getElementById('roleForm').submit();
             }
         });
     </script>
   </body>
</html>