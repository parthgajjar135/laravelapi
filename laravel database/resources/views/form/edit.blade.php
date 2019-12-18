@extends('layouts.master')

@section('content')

@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method='post' action="{{ route('form.update', $productarray->product_id)}}" enctype='multipart/form-data'>

@method('PATCH')

@csrf

<h3>Update Product</h3>

<table>
    <tr>
        <td>Name:</td>
        <td><input type='text' name='product_name' value='{{ $productarray->product_name }}'></td>
    </tr>

    <tr>
        <td>Details:</td>
        <td><input type='text' name='product_details' value='{{ $productarray->product_details }}'></td>
    </tr>

    <tr>
        <td>Price:</td>
        <td><input type='number' name='product_price' value='{{ $productarray->product_price }}'></td>
    </tr>

    <tr>
        <td>Quantity:</td>
        <td><input type='number' name='product_qty' value='{{ $productarray->product_qty }}'></td>
    </tr>
    <tr>
        <td>Subcat Id:</td>
        <td><input type='number' name='subcat_id' value='{{ $productarray->subcat_id }}'></td>
    </tr>
    <tr>
        <td>Image:</td>
        <td><input type='file' name='product_image' value='{{ $productarray->product_image }}'></td>
    </tr>
    <tr>
        <td></td>
        <td><input type='submit' value="Update"> 
        <a href="{{ URL::route('form.index') }}">Back</a>
        </td>
    </tr>

</table>
</form>
@endsection