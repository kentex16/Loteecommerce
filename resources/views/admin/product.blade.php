<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
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
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include ('admin.sidebar')
      <!-- partial -->
     
        <!-- partial:partials/_navbar.html -->
        @include ('admin.navbar')
        <!-- partial -->
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
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>