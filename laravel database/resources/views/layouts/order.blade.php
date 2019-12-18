<html>
<body>

<center><h1> Order </h1></center>
<hr/>

<a href='{{ route('order.create') }}'>Add Order</a> |
<a href='{{ route('order.index') }}'>View Order</a>

@yield('content')

</body>
</html>