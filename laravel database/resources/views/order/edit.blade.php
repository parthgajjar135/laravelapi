@extends('layouts.order')

@section('content')

@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method='post' action="{{ route('order.update', $orderarray->ord_id)}}" enctype='multipart/form-data'>

@method('PATCH')

@csrf

<h3>Update Order</h3>
<input type="hidden" name="user_id" value="1">
<table>
    <tr>
        <td>Order Status:</td>
        <td><input type='text' name='ord_status' value='{{ $orderarray->ord_status }}'></td>
    </tr>

    <tr>
        <td>Shipping Name:</td>
        <td><input type='text' name='ship_name' value='{{ $orderarray->ship_name }}'></td>
    </tr>

    <tr>
        <td>Shipping Number:</td>
        <td><input type='number' name='ship_no' value='{{ $orderarray->ship_no }}'></td>
    </tr>

    <tr>
        <td>Shipping Address:</td>
        <td><input type='text' name='ship_address' value='{{ $orderarray->ship_address }}'></td>
    </tr>
    
    <tr>
        <td></td>
        <td><input type='submit' value="Update"> 
        <a href="{{ URL::route('order.index') }}">Back</a>
        </td>
    </tr>

</table>
</form>
@endsection