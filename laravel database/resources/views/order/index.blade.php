
@extends('layouts.order')

@section('content')
<center>
@if (session()->get('success'))
    {{session()->get('success')}}
    
@endif

<table border='1'>

<thead>
    <tr>
        <th> ID </th>
        <th> User ID </th>
        <th> Order Status </th>
        <th> Shipping Name </th>
        <th> Shipping Number </th>
        <th> Shipping Address </th>
        <th> Action </th>
    </tr>
</thead>
<tbody>

    @foreach($orderarray as $order)

    <tr>
        <td>{{$order->ord_id}}</td>
        <td>{{$order->user_id}}</td>
        <td>{{$order->ord_status}}</td>
        <td>{{$order->ship_name}}</td>
        <td>{{$order->ship_no}}</td>
        <td>{{$order->ship_address}}</td>
        <td><a href="{{ route('order.edit',$order->ord_id)}}"> Edit </a> | 
        
            <form action="{{ route('order.destroy', $order->ord_id)}}" method="post" >
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