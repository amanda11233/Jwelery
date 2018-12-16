@extends('layouts.admin-app')

@section('content')

<div class = "container">
<div class = "row">

        
  
<div class = "col-md-12">
        
        <div class = "container-fluid mb-3 mt-3">
                <button class = "btn btn-primary" data-toggle = "modal" data-target = "#addModal">Add Categories</button>
            </div>

        <table class = "table table-hover">
                <tr>
                <th></th>
                <th></th>
                    <th>SN</th>
                  
                    <th>Category Name</th>
              
                <th></th>
                
                </tr>
                @foreach($categories as $key => $value)
                <tr>
                        <td></td>
                        <td></td>
                <td>{{$key + 1}}</td>
                <td>{{$value->category_name}}</td>
                <td><img src = "{{asset('images/categories/' . $value->category_name . '/' . $value->image)}}" class = "product-img"></td>
                
                <td>
                <form method = 'post' action = '{{route('category.destroy', $value->id)}}'>
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

{{-- Add Category Model --}}

<div class = "modal fade" id = "addModal" tabindex = "-1" role = "dialog" aria-labelledby="addModal">

        <div class = "modal-dialog" role = "document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    {{-- Add Categories Form --}}
                <form action = "{{route('category.store')}}" method = "POST" enctype="multipart/form-data">
                    @csrf
                 
        
                {{-- Categories Name --}}
                <div class = "form-group">
                    <label>Categories Name:</label>
                <input type = "text" id = "name" name = "name" class = "form-control" required>
                 </div>
                 <div class = "form-group">
                    <label>Categories Image:</label>
                <input type = "file" id = "image" name = "image" class = "form-control" required>
                 </div>
                 <div class = "form-group">
                        
                        <button type="submit" class="btn btn-primary" >Submit</button>
                     </div>
                  </form>
                </div>
        
              
                
                <div class="modal-footer">
                       
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 
                </div>
              </div>
        
        </div>
        
        
        </div>
        
        {{-- End Add Category Model --}}

@endsection
