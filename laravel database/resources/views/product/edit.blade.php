@extends('layouts.admin_master')

@section('style')

        <title>Update Product</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

       <!-- Bootstrap Core CSS -->
       <link href="{{ asset('css/bootstrap.css')}}" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="{{ asset('css/style.css')}}" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="{{ asset('css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons CSS -->

<!-- side nav css file -->
<link href="{{ asset('css/SidebarNav.min.css')}}" media='all' rel='stylesheet' type='text/css'/>
<!-- side nav css file -->

<!-- js-->
<script src="{{ asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset('js/modernizr.custom.js')}}"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- Metis Menu -->
<script src="{{ asset('js/metisMenu.min.js')}}"></script>
<script src="{{ asset('js/custom.js')}}"></script>
<link href="{{ asset('css/custom.css')}}" rel="stylesheet">
<!--//Metis Menu -->

</head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">
@endsection

        @section('content')

        @if ($errors->any())

<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="forms">
                        <h2 class="title1">Update Product Form</h2>

                        <div class=" form-grids row form-grids-right">
                            <div class="widget-shadow " data-example-id="basic-forms"> 
                                <div class="form-title">
                                    <h4>Update Product:</h4>
                                </div>
                                <div class="form-body">
                                    <form method="post" action="{{ route('product.update', $productarray->product_id)}}" class="form-horizontal" enctype="multipart/form-data">
                                    @method('PATCH')

@csrf
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Name:</label> 
                                            <div class="col-sm-9"> 
                                                <input type="text" name='product_name' value='{{ $productarray->product_name }}' class="form-control" id="inputEmail3" required>
                                            </div> 
                                        </div> 
                                        <div class="form-group">
                                            <label for="txtarea1" class="col-sm-2 control-label">Product Details:</label>
                                            <div class="col-sm-9">
                                                <textarea name='product_details' value='{{ $productarray->product_details }}' class="form-control" id="inputEmail3" required>{{($productarray->product_details)}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Price:</label> 
                                            <div class="col-sm-9"> 
                                                <input type="number" name='product_price' value='{{ $productarray->product_price }}' class="form-control" id="inputEmail3" required>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Quantity:</label> 
                                            <div class="col-sm-9"> 
                                                <input type="number" name="product_qty" class="form-control" id="inputEmail3" value='{{ $productarray->product_qty }}' placeholder="Enter Quantity" required>
                                            </div> 
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Sub Category Name:</label> 
                                            <div class="col-sm-9"> 
                                            <select class="form-control" name="subcat_id" required>
                                                                            <option value="" selected disabled>Select</option>
                                                                            
                                                                        </select>
                                            </div>  
                                        </div> 
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Product Image:</label> 
                                            <div class="col-sm-9"> 
                                                <input type="file" class="form-control" id="inputEmail3" name="product_image" value='{{ $productarray->product_image }}' required="">
                                            </div> 
                                        </div> 
                                        
                                        
                                        <div class="col-sm-offset-2"> 
                                            <button type="submit" class="btn btn-default" >Submit</button>
                                        </div> 
                                    </form> 
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            @endsection
@section('script')
        </div>
<!-- side nav js -->
<script src="{{ asset('js/SidebarNav.min.js')}}" type='text/javascript'></script>
        <script>
            $('.sidebar-menu').SidebarNav()
        </script>
        <!-- //side nav js -->

        <!-- Classie --><!-- for toggle left push menu script -->
        <script src="{{ asset('js/classie.js')}}"></script>
        <script>
            var menuLeft = document.getElementById('cbp-spmenu-s1'),
                    showLeftPush = document.getElementById('showLeftPush'),
                    body = document.body;

            showLeftPush.onclick = function () {
                classie.toggle(this, 'active');
                classie.toggle(body, 'cbp-spmenu-push-toright');
                classie.toggle(menuLeft, 'cbp-spmenu-open');
                disableOther('showLeftPush');
            };

            function disableOther(button) {
                if (button !== 'showLeftPush') {
                    classie.toggle(showLeftPush, 'disabled');
                }
            }
        </script>
        <!-- //Classie --><!-- //for toggle left push menu script -->

        <!--scrolling js-->
        <script src="{{ asset('js/jquery.nicescroll.js')}}"></script>
        <script src="{{ asset('js/scripts.js')}}"></script>
        <!--//scrolling js-->

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('js/bootstrap.js')}}"></script>

    </body>
</html>
@endsection