@extends('layouts.master')

@section('content')

@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method='post' action="{{ route('form.store')}}" enctype='multipart/form-data'>

@csrf

<h3>Add Product</h3>

<table>
    <tr>
        <td>Name:</td>
        <td><input type='text' name='product_name' required></td>
    </tr>

    <tr>
        <td>Details:</td>
        <td><input type='text' name='product_details' required></td>
    </tr>

    <tr>
        <td>Price:</td>
        <td><input type='number' name='product_price' required></td>
    </tr>
    <tr>
        <td>Quantity:</td>
        <td><input type='number' name='product_qty' required></td>
    </tr>
    <tr>
        <td>Subcat id:</td>
        <td><input type='number' name='subcat_id' required></td>
    </tr>
    <tr>
        <td>Image:</td>
        <td><input type='file' name='product_image' required></td>
    </tr>

    <tr>
        <td></td>
        <td><input type='submit'> <input type='reset'></td>
    </tr>

</table>
</form>
@endsection