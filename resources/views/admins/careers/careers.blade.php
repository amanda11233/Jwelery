@extends('layouts.admin-app')

@section('content')

<div class = "container">
<div class = "row">

        
  
<div class = "col-md-12">
        
  @if(Session::has('deleted'))
<div class = "alert alert-danger mt-5">{{Session::get('deleted')}}</div>
  @endif

        <table class = "table table-hover">
                <tr>
                <th></th>
                <th></th>
                    <th>SN</th>
                  
                    <th>Applicant's Name</th>
                    <th>Applicant's Email</th>
                    <th> CV</th>
                <th></th>
                
                </tr>
                @foreach($careers as $key => $value)
                <tr>
                        <td></td>
                        <td></td>
                <td>{{$key + 1}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td><a href = "{{public_path('/documents/CVs/' . $value->email . '/' . $value->cv)}}" download>{{$value->cv}}</a></td>
                <td></td>
                <td>
                <form method = 'post' action = '{{route('careers.destroy', $value->id)}}'>
                    @csrf
                    {!! method_field('delete') !!}
                        <button type = "submit" class = "btn btn-danger" ><span class = "fa fa-trash"></span></button></form>
                
                </td>
                
                </tr>
                @endforeach
                
                    </table>
</div>




</div>
</div>


@endsection
