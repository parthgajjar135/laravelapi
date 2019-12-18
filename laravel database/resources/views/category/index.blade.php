@extends('layouts.admin_master')

@section('style')

        <title>Category Database Table</title>
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
        $(document).ready(function(){
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
                        <h4>Category Table</h4>
                        <table id='myTable' class='table table-hover'>
                        
                        

<thead>
    <tr>
        <th> ID </th>
        <th> Category Name </th>
        <th> IS Active </th>
        <th> Action </th>
    </tr>
</thead>
<tbody>

    @foreach($productarray as $product)

    <tr>
        <td>{{$product->cat_id}}</td>
        <td>{{$product->cat_name}}</td>
        <td>{{$product->cat_active}}</td>
        <td><a href="{{ route('category.edit',$product->cat_id)}}"> Edit </a> | 
        
            <form action="{{ route('category.destroy', $product->cat_id)}}" method="post" >
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

