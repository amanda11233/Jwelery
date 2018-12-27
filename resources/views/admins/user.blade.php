@extends('layouts.admin-app')

@section('content')

<div class = "container">
<div class = "row">

  
<div class = "col-md-12">

        <table class = "table table-hover">
                <tr>
                
                    <th>SN</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Gender</th>
                    <th>Address</th>
                <th></th>
                
                </tr>
                @foreach($users as $key => $value)
                <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->phone}}</td>
                <td>{{$value->gender}}</td>
                <td>{{$value->address}}</td>
             
                
                </tr>
                @endforeach
                
                    </table>
</div>




</div>
</div>

@endsection
