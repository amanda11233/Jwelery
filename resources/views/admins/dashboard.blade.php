@extends('layouts.admin-app')

@section('content')

<div class = "container mt-5">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class = "dashboard">
    <h1 class = "text-center">Admin Dashboard</h1><hr>
    <div class = "row">
        <div class = "col-sm-4">
                <a href = "{{route('admin.users')}}">   <div class = "dashboard-user">
                        <h1 class = "text-center"><span class = "fa fa-user"></span> &nbsp;
                         Users</h1>
                    </div></a>
        </div> 
        <div class = "col-sm-4">
                <a href = "{{route('admin.products')}}"> <div class = "dashboard-jwelery">
                        <h1 class = "text-center"> 
                                <span class = "fa fa-diamond"></span> &nbsp; 
                                Jwelery</h1>
                    </div></a>
            </div> 
            <div class = "col-sm-4">
            
        <div class = "dashboard-category">
                <a href = "{{route('admin.categories')}}">  <h1 class = "text-center">
                        <span class = "fa fa-book"></span> &nbsp;
                      Category</h1>
            </div></a>
                </div> 
                <div class = "col-sm-4">
                        <a href = "{{route('admin.offers')}}">  <div class = "dashboard-offer">
                                <h1 class = "text-center">
                                        <span class = "fa fa-dollar"></span> &nbsp;
                                        Offers</h1>
                            </div></a>
                    </div> 
                    <div class = "col-sm-4">
                        <a href = "{{route('careers.index')}}">  <div class = "dashboard-career">
                                <h1 class = "text-center">
                                        <span class = "fa fa-laptop"></span> &nbsp;
                                        Careers</h1>
                            </div></a>
                    </div> 
    </div>
   
    
           
</div>    

</div>    
</div>    
</div>   

@endsection