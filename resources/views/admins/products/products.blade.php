@extends('layouts.admin-app')

@section('content')

<div class = "container">
<div class = "row">

  
<div class = "col-md-12">
        <div class = "container-fluid mb-3 mt-3">
                <button class = "btn btn-primary" data-toggle = "modal" data-target = "#addModal">Add Product</button>
            </div>
        <table class = "table table-hover">
                <tr>
                
                    <th>SN</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    
                <th></th>
                <th></th>
                
                </tr>
                @foreach($products as $key => $value)
                <tr>
                <td>{{$key + 1}}
                      
                    </td>
                <td>{{$value->product_name}}</td>
          
                <td>{{$value->category->category_name}}</td>
                <td style="display:none;">{{$value->category->id}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->desc}}</td>
                <td style="display:none;">{{$value->id}}</td>
                <td><img src = "{{asset('images/Products/' . $value->product_name . '/' . $value->image)}}" class = "product-img"></td>
                <td>
                    <button class = "btn btn-secondary" id = "edit" data-toggle = "modal" data-target = "#editModal" onclick = "takeid(this);" >
                        Edit
                    </button>
                </td>
                <td>
                <form method = "post" action = "{{route('product.destroy', $value->id)}}">
                        @csrf
                        {!! method_field('delete') !!}
                            <button type = "submit" class = "btn btn-danger" >
                                <span class = "fa fa-trash"></span>
                            </button>
                    </form>
                        
                
                </td>
                
                </tr>
                @endforeach
                
                    </table>
</div>




</div>
</div>

{{-- Add Products Modal --}}

<div class = "modal fade" id = "addModal" tabindex = "-1" role = "dialog" aria-labelledby="addModal">

        <div class = "modal-dialog" role = "document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   
                <form action = "{{route('product.store')}}" method = "POST" enctype="multipart/form-data">
                    @csrf
                 
        
                
                <div class = "form-group">
                    <label>Product Name:</label>
                <input type = "text" id = "name" name = "name" class = "form-control" required>
                 </div>
                 <div class = "form-group">
                        <label>Category:</label>
                 <select class = "form-control" name = "category">
                    @foreach($categories as $category)    
                 <option value = "{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                 </select>
                     </div>
                     <div class = "form-group">
                            <label>Price</label>
                        <input type = "number" step = "any" id = "price" name = "price" class = "form-control" required>
                         </div>
                         <div class = "form-group">
                                <label>Description</label>
                         <textarea id = "desc" name = "desc" class = "form-control" required></textarea>
                             </div>
                         <div class = "form-group">
                                <label>Image</label>
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
{{-- End Products Modal  --}}


{{-- Edit Product Modal --}}

<div class = "modal fade" id = "editModal" tabindex = "-1" role = "dialog" aria-labelledby="editModal">

        <div class = "modal-dialog" role = "document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalLabel">Edit Products</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   
                <form action = "{{route('product.editProduct')}}" method = "POST" enctype="multipart/form-data">
                    @csrf
                 
        
                    <div class = "form-group">
                           
                        <input type = "hidden" id = "up_id" name = "id" class = "form-control" required>
                         </div>
                <div class = "form-group">
                    <label>Product Name:</label>
                <input type = "text" id = "up_name" name = "name" class = "form-control" required>
                 </div>
                 <div class = "form-group">
                        <label>Category:</label>
                 <select class = "form-control" name = "category">
             <option id = "up_category" ></option>
                    @foreach($categories as $category)    
                 <option value = "{{$category->id}}" id = "">{{$category->category_name}}</option>
                    @endforeach
                 </select>
                     </div>
                     <div class = "form-group">
                            <label>Price</label>
                        <input type = "number" step = "any" id = "up_price" name = "price" class = "form-control" required>
                         </div>
                         <div class = "form-group">
                                <label>Description</label>
                           <textarea class = "form-control" name = "desc" id = "up_desc" required></textarea>
                             </div>
                         <div class = "form-group">
                                <label>Image</label>
                            <input type = "file" id = "up_image" name = "image" class = "form-control" required>
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
        <script>
        function takeid(n){
         
             var row = n.parentNode.parentNode;
            var col = row.getElementsByTagName("td");
            var i = 0;
            
            while(i < col.length){
                document.getElementById('up_id').value  = col[6].textContent;
                document.getElementById('up_name').value = col[1].textContent;
                document.getElementById('up_category').innerHTML = col[2].textContent ;
                document.getElementById('up_category').value = col[3].textContent
                document.getElementById('up_price').value = col[4].textContent ;
                document.getElementById('up_desc').value = col[5].textContent ;
                i++;
  }
             
            }
        
        </script>
@endsection
