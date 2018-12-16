@extends('layouts.admin-app')

@section('content')

<div class = "container">
        <div class = "row">
        
                
          
        <div class = "col-md-12">
                
                <div class = "container-fluid mb-3 mt-3">
                        <button class = "btn btn-primary" data-toggle = "modal" data-target = "#addModal">Add Offers</button>
                    </div>
        
                <table class = "table table-hover">
                        <tr>
                        <th></th>
                        <th></th>
                            <th>SN</th>
                            <th>Offer Name</th>
                            <th>Category Name</th>
                            <th>Discount(%)</th>
                            <th>Offer Time</th>
                      
                        <th></th>
                        
                        </tr>
                        @foreach($offers as $key => $value)
                        <tr>
                                <td></td>
                                <td></td>
                        <td>{{$key + 1}}</td>
                        <td>{{$value->offer_name}}</td>
                        <td>{{$value->categories->category_name}}</td>
                        <td>{{$value->discount}}</td>
                        <td>{{$value->offer_time}}</td>
                       
                    <td>  <form method = 'post' action = '{{route('offer.destroy', $value->id)}}'>
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

{{-- Add Offer Model --}}

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
                    {{-- Add Offers Form --}}
                <form action = "{{route('offer.store')}}" method = "POST" enctype="multipart/form-data">
                    @csrf
                 
        
                {{-- Offers Name --}}
                <div class = "form-group">
                    <label>Offers Name:</label>
                <input type = "text" id = "name" name = "name" class = "form-control" required>
                 </div>
                 <div class = "form-group">
                    <label>Categories Name:</label>
               <select name = "category" class = "form-control">
                   @foreach($categories as $category)
               <option value = "{{$category->id}}">{{$category->category_name}}</option>

                   @endforeach
               </select>
                 </div>
                 <div class = "form-group">
                     <label>Discount(%)</label>
                     <input type = "number" class = "form-control" name = "discount" step = "any">
                 </div>
                 <div class = "form-group">
                        <label>Offer Time</label>
                        <input type = "text" class = "form-control" name = "time" >
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
        
        {{-- End Add Offer Model --}}
@endsection