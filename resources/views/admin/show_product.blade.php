<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
        .center{
            margin:auto;
            width: 50%;
            border:2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size{
            text-align: center;
            font-size: 40px;
            padding-top:20px;
        }
        .img_size{
            width: 500px;
            height: 150px;
        }
        .th_column{
            background:skyblue;
        }
        .th_deg{
            padding: 30px;
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
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include ('admin.navbar')
       <!-- partial -->
       <div class="main-panel">
        <div class="content-wrapper">
            <h2 class="font_size">Products</h2>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
            <table class="center"> 
                <tr class="th_column">
                    <th class="th_deg"> Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Location</th>
                    <th class="th_deg">Category</th>
                    <th class="th_deg">Property Type</th>
                    <th class="th_deg">Lot Area</th>  
                    <th class="th_deg">Edit</th>
                    <th class="th_deg">Delete</th> 
                    <th class="th_deg">Image</th> 
                </tr>

                @foreach($product as $product)

                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->location}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->property_type}}</td>
                    <td>{{$product->lot_area}}</td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm ('Are you sure you want to delete?')" href="{{url('delete_product',$product->id)}}">Delete</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url('update_product',$product->id)}}"> Edit</a>
                    </td>
                    <td>
                        <img class="img_size" src="/product/{{$product->image}}" alt="">
                    </td>
                    
                </tr>

                @endforeach
            </table>
          <!-- partial -->
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