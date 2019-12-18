
        @extends('layouts.orderdetail')

@section('content')

@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
        <form method="post" action="{{ route('orderdetail.store')}}">
        @csrf
            <center>
                
                <table style="text-align:left;">
                    
                    <tr>
                        <th><label>Order Name:</label></th>
                        <td><select name="ord_id" required>
                                <option value="" selected disabled>Select</option>
                                        @foreach($orderdetail_array as $orderdetail)
                                            <option value="{{$orderdetail->ord_id}}"> {{$orderdetail->ship_name}}</option>
                                        @endforeach
                        </select></td>
                    </tr>

                    <tr>
                        <th><label>Product Name:</label></th>
                        <td><select name="product_id" required>
                                    <option value="" selected disabled>Select</option>
                                            @foreach($orderdetailarray as $orderdetail)
                                                <option value="{{$orderdetail->product_id}}"> {{$orderdetail->product_name}}</option>
                                            @endforeach
                        </select></td>
                    </tr>

                    <tr>
                        <th><label>Product Qty:</label></th>
                        <td><input type="number" name="product_qty" placeholder="Enter Qty" required></td>
                    </tr>

                    <tr>
                        <th><label>Product Price:</label></th>
                        <td><input type="number" name="product_price" placeholder="Enter Price" required></td>
                    </tr>
                </table>
                
                </br></br>
                <input type="submit" value="Enter">&emsp;&emsp;&emsp;
            </center>
        </form>
    @endsection