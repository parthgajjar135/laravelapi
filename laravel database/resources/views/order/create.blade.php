
        @extends('layouts.order')

@section('content')

@if ($errors->any())

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
        <form method="post" action="{{ route('order.store')}}">
        @csrf
            <center>
                
                <input type="hidden" name="user_id" value="1">
                <table style="text-align:left;">
                    
                    <tr>
                        <th><label>Order Status:</label></th>
                        <td><input type="text" name="ord_status" placeholder="Enter Status" required></td>
                    </tr>

                    <tr>
                        <th><label>Shipping Name:</label></th>
                        <td><input type="text" name="ship_name" placeholder="Enter Name" required></td>
                    </tr>

                    <tr>
                        <th><label>Shipping Number:</label></th>
                        <td><input type="text" name="ship_no" placeholder="Enter Number" required></td>
                    </tr>

                    <tr>
                        <th><label>Shipping Address:</label></th>
                        <td><input type="text" name="ship_address" placeholder="Enter Address" required></td>
                    </tr>
                </table>
                
                </br></br>
                <input type="submit" value="Enter">&emsp;&emsp;&emsp;
            </center>
        </form>
    @endsection