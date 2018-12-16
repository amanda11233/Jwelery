@extends('layouts.app')

   
   
@section('content')
<script>

    $(document).ready(function(){
        $('.navbar').addClass('fixed-top');
       
        if($(window).scrollTop()<=50){
            $('.navbar').addClass('transparent');
            $('.app-name').addClass('text-white');
            }
        $(window).scroll(function(){
            if($(window).scrollTop()>=50){
                $('.navbar').removeClass('transparent');
                $('.app-name').removeClass('text-white');
            }else{
                $('.navbar').addClass('transparent');
                $('.app-name').addClass('text-white');
            }
        });
    });

</script>
@if(Session::has('purchased'))

<?php echo "<script>alert('Items Purchased')</script>"?>
@endif
    <!-- Main Contents -->
    <div id="jweleryslide" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{asset('images/images/slide1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('images/images/slide2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{asset('images/images/slide3.jpg')}}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#jweleryslide" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#jweleryslide" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class = "container-fluid mt-5  mb-lg-5">
        <div class = "category-title">

           
        </div><br>
        <div class = "row">
            @foreach($categories as $category)

            <div class = "col-sm-4 mt-4 categories">
                    <a href = "{{route('category.show', $category->category_name)}}">
            <div class = "outer">	<img src = "{{asset('images/categories/' . $category->category_name . '/' . $category->image)}}">
               <div class = "inner">  
                        <h4 class = "text-center pt-2 pb-3">{{$category->category_name}}</h4>
                    </div>
                </div>
            </a>
            </div>
         
            @endforeach
           
        </div>
        
    </div>
    <div class = "container mt-4 ">
            <div class  = "page">{{$categories->links()}}</div>
    </div> 
    <div class = "intersection-image-section">

        <div class = "intersection-divider"></div>

    </div>

    <div class = "about-us-section container-fluid mt-5">

        <div class = "about-title">
            <h1 class = "text-center"> About Us</h1>

        </div><hr>
<div class= "row about-body">
    <div class = "col-sm-6 col-md-6">
          

                    <p class = "text-justify">Discover our luxury jewellery creations and indulge in our joyful collections. Browse below through a vast selection of precious pieces including pendants, necklaces, rings, earrings and bracelets. Find specific wedding jewellery in our Bridal section or discover unique, handcrafted pieces in our High Jewellery section. </p>
       
     
               
    </div>
    <div class = "col-sm-6 col-md-6">
        
            
        <p class = "text-justify">For a 100% safe purchase, all goods are insured by us until they reach you securely.</p>
        <br>
        <p class = "text-justify">The BlueStone Stores are cool and contemporary spaces for you to browse through our collections at your leisure.</p>
</div>
     

    </div>
    </div>
   <div class = "footer">
    <div class = "container mt-5">
        <div class = "row ">
            <div class = "col-md-6">
                <div class = "foot-left">
                    <div class = "website-logo"><h1>JWELERYS</h1></div>

                    <div class = "foot-list">
                        <ul>
                            <li>Products</li>
                            <li>Glossary</li>
                            <li>Others</li>
                        </ul>

                    </div>
                </div>
            </div>


            <div class = "col-sm-6">
                <div class = "foot-right">
                    <div class = "contact-title"><h1 class = "text-center">Contact Us</h1></div>

                    <div class = "container-fluid mt-5">
                        <div class = "row">
                            <div class = "col-lg-5"><h6>Address:</h6></div>
                            <div class = "col-lg-7"><h6>Dillibazar, Kathmandu</h6></div>

                        </div>
                        <div class = "row">
                            <div class = "col-lg-5"><h6>PhoneNumber:</h6></div>
                            <div class = "col-lg-7"><h6>9992311231</h6></div>


                        </div>
                        <div class="mapouter mt-5"><div class="gmap_canvas"><iframe width="400" height="200" id="gmap_canvas" src="https://maps.google.com/maps?q=cci&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.crocothemes.net"></a></div><style>.mapouter{height:200px;width:200px;}.gmap_canvas {background:none!important;height:200px;width:200px;}</style></div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</footer>
    <script>


            $(document).ready(function(){
    
                $(".outer").mouseenter(function(){
    
                    $(this).children(".inner").css({"display":"block"});
    
                });
                $(".outer").mouseleave(function(){
    
                    $(this).children(".inner").css({"display":"none"});
    
                });
    
    
    
            });
        </script>
    @endsection