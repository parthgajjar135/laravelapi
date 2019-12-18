@extends('layouts.admin_master')

@section('style')

        <title>Product Database Table</title>
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

        <script src="{{ asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery.dataTables.js')}}" type="text/javascript"></script>
        <link href="{{ asset('css/jquery.dataTables.css')}}" rel="stylesheet" type="text/css"/>
        <script>
            $(document).ready(function () {
                $("#myTable").dataTable();
            });
        </script>

    </head> 
    <body class="cbp-spmenu-push">
        <div class="main-content">

@endsection

        @section('content')

        @if (session()->get('success'))
    {{session()->get('success')}}
    
@endif
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="tables">
                        <h2 class="title1">Database Table</h2>
                        <div class="bs-example widget-shadow" data-example-id="hoverable-table"> 
                        <h4>Product Table</h4>
                        <table id='myTable' class='table table-hover'>
                        
                        

<thead>
    <tr>
        <th> ID </th>
        <th> Product Name </th>
        <th> Product Details </th>
        <th> Product Price </th>
        <th> Product Quantity </th>
        <th> SubCat Name </th>
        <th> Product Image </th>
        <th> Action </th>
    </tr>
</thead>
<tbody>

    @foreach($productarray as $product)

    <tr>
        <td>{{$product->product_id}}</td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->product_details}}</td>
        <td>{{$product->product_price}}</td>
        <td>{{$product->product_qty}}</td>
        <td>{{$product->subcat_name}}</td>
        <td><img src="{{url('storage/uploads/'.$product->product_image) }}" alt='image' width='50'></td>
        <td><a href="{{ route('product.edit',$product->product_id)}}"> Edit </a> | 
        
            <form action="{{ route('product.destroy', $product->product_id)}}" method="post" >
                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>
            </form>
        </td>

    </tr>
    @endforeach
</tbody>
</table>
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

