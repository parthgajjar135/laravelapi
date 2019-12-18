@extends('layouts.master')

@section('content')

@if (session()->get('success'))
    {{session()->get('success')}}
    
@endif

<table border='1'>

<thead>
    <tr>
        <th> ID </th>
        <th> Product Name </th>
        <th> Product Details </th>
        <th> Product Price </th>
        <th> Product Quantity </th>
        <th> Subcat Id </th>
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
        <td>{{$product->subcat_id}}</td>
        <td><img src="{{url('storage/app/public/uploads/'.$product->product_image)}}" alt='image' width='50'></td>
        <td><a href="{{ route('form.edit',$product->product_id)}}"> Edit </a> | 
        
            <form action="{{ route('form.destroy', $product->product_id)}}" method="post" >
                @csrf
                @method('DELETE')

                <button type="submit">Delete</button>
            </form>
        </td>

    </tr>
    @endforeach
</tbody>
</table>
@endsection