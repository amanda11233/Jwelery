@extends('layouts.admin-app')

@section('content')

<div class = "container">
<div class = "row">

  
<div class = "col-md-12">

        <table class = "table table-hover">
                <tr>
                
                    <th>SN</th>
                    <th>Buyer</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Time</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                 
                    
                <th></th>
                <th></th>
                <th></th>
                </tr>
                @foreach($orders as $key => $value)
                <tr>
                <td>{{$key + 1}}
                      
                    </td>
                    <td>{{$value->user->name}}</td>
                    <td>{{$value->user->address}}</td>
                    <td>{{$value->user->phone}}</td>
                    <td>{{$value->created_at}}</td>
                    <td><span class = "fa fa-minus"></span></td>
                        <td><span class = "fa fa-minus"></span></td>
                        <td><span class = "fa fa-minus"></span></td>
                        <td><form action = "{{route('admin.orders-delete', $value->id)}}" method = "post">
                                @csrf
                           
                            <button type = "submit" class = "btn btn-danger"><span class = "fa fa-trash"></span></button>
                            </form></td>
                    @foreach(unserialize($value->cart)->items as $data)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td><td></td>
                    <td>{{$data['item']['product_name']}}</td>
                    <td>{{$data['price']}}</td>
                    <td>{{$data['qty']}}</td>
                    
                    <td></td>
                    </tr>
                    @endforeach
                    
              
                </tr>
                @endforeach
                
                    </table>
</div>




</div>
</div>

@endsection