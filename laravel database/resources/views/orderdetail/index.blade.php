
@extends('layouts.orderdetail')

@section('content')
<center>
@if (session()->get('success'))
    {{session()->get('success')}}
    
@endif

<table border='1'>

<thead>
    <tr>
        <th> ID </th>
        <th> Ship Name </th>
        <th> Product Name </th>
        <th> Product Qty </th>
        <th> Product Price </th>
        <th> Action </th>
    </tr>
</thead>
<tbody>

    @foreach($orderdetailarray as $orderdetail)

    <tr>
        <td>{{$orderdetail->od_id}}</td>
        @foreach($orderdetail_array as $orderdetails)
        <td>{{$orderdetails->ship_name}}</td>
        @endforeach
        <td>{{$orderdetail->product_name}}</td>
        <td>{{$orderdetail->product_qty}}</td>
        <td>{{$orderdetail->product_price}}</td>
        <td><a href="{{ route('orderdetail.edit',$orderdetail->od_id)}}"> Edit </a> | 
        
            <form action="{{ route('orderdetail.destroy', $orderdetail->od_id)}}" method="post" >
                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>
            </form>
        </td>

    </tr>
    @endforeach
</tbody>
</table>
</center>
@endsection