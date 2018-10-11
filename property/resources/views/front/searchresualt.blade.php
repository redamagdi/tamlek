     <!-- html links -->
@include('front.layout.header')
     <!-- End of html links -->

<body class="flexcroll home">

@include('front.layout.navigationbar')
  <!-- End of navigation bar  -->
  
  <!-- search form  -->
@include('front.layout.searchform')
  <!--End of search form  --> 

<section class="mt-3 mb-3">

     <!-- regions properties counters -->
@if($searchCities->count() > 0)   
 <div class="container">
  <div class="col-sm-12 search-result my-3">
   <div class="flex-row  d-flex justify-content-around p-3  ">
    @foreach($searchCities as $searchedcity)
      @foreach($searchedcity->regions as $searchregoin)
        @if($searchregoin->properities->count() > 0)
        <div class="">
         <a href=""> <span>{{ $searchregoin['name'] }} </span> <span>{{ $searchregoin->properities->count() }}</span> </a>
         <div >
         </div>
        </div>
        @endif
    @endforeach
   @endforeach   
   </div>     
  </div>
 </div>
@endif
     <!-- End of regions properties counters -->
       
 <div class="container ">
  <div class="row ">
   <div class="col-sm-12">
     <div class="osahan_top_filter row">
       
       <div class="col-lg-6 col-md-6">
         <h2><span class="heading_dividertext color2 float-left">Recommended properties in Egypt</span></h2>
       </div>
       
       <div class=" col-lg-3 col-md-3 ">
        <h5>{{ $properties->count() }} results</h5>
       </div> 
                            
       <div class="col-lg-3 col-md-3 sort-by-btn float-right">
        <div class="dropdown float-right">
        <button class="btn btn-tamlik btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="mdi mdi-filter"></i> Sort by 
        </button>
        <div class="dropdown-menu float-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> Popularity </a>
        <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> New </a>
        <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> Discount </a>
        <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> Price: Low to High </a>
        <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right"></i> Price: High to Low </a>
        </div>
        </div>
        </div>
    
     </div>
    </div>
    

        <!-- card of recomended -->

 <div class="container properties">
  <div class="container wow zoomIn">
    <div class="  card-deck mb-3 text-center">
         
         <!-- card of recomended -->
     @foreach($recomendedprt as $recomendedprop)
      <div class="card mb-4 box-shadow ">
        <div class="card-body" id="card">
            <img class="card-img-top" src="{{ asset($recomendedprop->images->first()['path']) }}" style="height: 348px; width: 515px;" alt="Card image cap">
            <p class="card-title mt-1">{{ $recomendedprop->header->first()['name'] }}</p>
        </div>

        <div class="card-footer text-primary ">
            <span > <i class="fas fa-bed"></i> Beds : <strong>3</strong></span>
            <span> <i class="fas fa-shower"></i> Baths : <strong>{{ $recomendedprop['room'] }}</strong></span>
            <span> <i class="fas fa-map-marker-alt"></i> Area : <strong>{{ $recomendedprop['area'] }}</strong></span>
        </div>
      </div>
    @endforeach
        
        <!-- End of card of recomended -->

    </div>
   </div>
  </div>

 <div class="col-lg-8 col-md-8">
  <div class="row">
@if($properties->count() > 0)
 @foreach($properties as $properity) 
   <div class="col-lg-12 col-md-8  wow zoomIn">
     <div class="card card-list card-list-view">
      <a href="#">
       <div class="row no-gutters">

        <div class="col-lg-5 col-md-5">					 
          <span class="badge bg-dark text-white"> <i class="fas fa-camera"></i> 10</span>
          <img class="card-img-top" style="height: 205px; width: 304px;" src="{{ asset($properity->images->first()['path']) }}"alt="Card image cap">
        </div>

        <div class="col-lg-7 col-md-7">
         <div class="card-body ">
          
          <span class="font-weight-bold color2 float-right pr-2">permium </span>
          <h5 class="card-title pl-2">{{ $properity->header->first()['name'] }}</h5>
          <img class="float-right m-2 img-fluid" src="{{ asset('frontstyle/img/327-logo.jpg') }}" style=" width:70px ;  ">
          <h6 class="card-subtitle  pl-2 mb-2 text-muted">
          <i class="fas fa-map-marker-alt"></i> {{ $properity->region['name'] }}, {{ $properity->region->city['name'] }}, {{ $properity->region->city->country['name'] }}  </h6>
          <h4 class="color2 mb-0 mt-3  pl-2 font-weight-bold ">$ {{ $properity['cost'] }} </small></h4>
          
          <div class="">
           <span class="m-3"> {{ $properity->typeproperity->name->first()['name'] }} <strong></strong></span>
           <span class="m-3"> {{ $properity['room'] }}<i class="fas fa-bed ml-1"></i> <strong></strong></span>
           <span class="m-3"> {{ $properity['bathroom'] }}<i class="fas fa-shower ml-1"></i> <strong></strong></span>
          </div>

        </div>
         
        <div class="card-footer mt-4">
          <strong class=" btn-box  mr-1 ml-1 pl-2 pr-2 color1 font-weight-bold" onclick="switchIcon()" ><i class="fas fa-phone"></i>  Call </strong>
          <strong class=" btn-box   mr-1 ml-1 pl-2 pr-2 color1 font-weight-bold" onclick="switchIcon()" ><i class="fas fa-envelope"></i> Mail </strong>
          <strong class=" btn-box  mr-1 ml-1  pl-2 pr-2 color1 font-weight-bold" onclick="switchIcon()" ><i id="acc1" class="far fa-heart "></i>  save </strong>
        </div>
      </div>   
     </div>	
    </a>
   </div>
 </div>
 @endforeach
 @else
   <h3 class="text-center" style="margin-left: 50px;"> No Resualts !! </h3>
 @endif                               
<nav class="mt-5">
<ul class="pagination justify-content-center">

 {{ $properties->links() }}

</ul>
</nav>

</div>
</div>

    <div class="col-sm-4  wow zoomIn ">
     <div class="card mb-4 box-shadow ">
      <div class="card-body" id="card">
        <a href="#" class=""><img class="img-fluid" src="{{ asset('frontstyle/img/banner.JPG') }}" alt="Card image cap" ></a>
      </div>                   
     </div>
    </div>
  </div>
 </div>
</section>

     <!-- End Properties List -->





    <!-- ================================================================================================== -->
    <!-- Join Team -->
     <!-- -=======================================================+=========================================-->


 <section class="section-padding bg-dark text-center">
    <h2 class="text-white mt-0">Join our professional team & agents<br>to start selling your house</h2>
    <p class="text-white mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    <button type="button" class="btn btn-primary color12 ">Contact Us</button> 
    <button type="button" class="btn btn-default">Read More</button>
 </section>
 <!-- End Join Team -->


    <!-- ================================================================== -->
     <!-- End Join Team -->
   <!-- ================================================================== -->

    <!-- Footer -->
    @include('front.layout.footer')
    <!-- end of footer -->
<script>
    function initMap() {
        var uluru = {
            lat: -25.363,
            lng: 131.044
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 3,
            center: uluru,
            styles: [{
                    elementType: 'geometry',
                    stylers: [{
                        color: '#64DDBA'
                    }]
                },
                {
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#64DDBA'
                    }]
                },
                {
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#201169'
                    }]
                },
                {
                    featureType: 'administrative.locality',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#201169'
                    }]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#201169'
                    }]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#263c3f'
                    }]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#6b9a76'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#ABABAB'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#212a37'
                    }]
                },
                {
                    featureType: 'road',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#9ca5b3'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#34495E'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry.stroke',
                    stylers: [{
                        color: '#1f2835'
                    }]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#f3d19c'
                    }]
                },
                {
                    featureType: 'transit',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#2f3948'
                    }]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#8A8A8A'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{
                        color: '#F2F6FF'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '#BCBCBC'
                    }]
                },
                {
                    featureType: 'water',
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#F2F6FF'
                    }]
                }
            ]
        });
        var contentString = '<div id="content">' +
            '<div id="bodyContent">' +
            '<div class="card card-list"><a href="#"><span class="badge color11">For Sale</span><img class="card-img-top" src="https://askbootstrap.com/preview/osahan-land/img/marker.png" alt="Card image cap"><div class="card-body"><h5 class="card-title">House in Kent Street</h5><h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i> 127 Kent Sreet, Sydny, NEW 2000</h6><h2 class="text-success mb-0 mt-3">$130,000 <small>/month</small></h2></div><div class="card-footer"><span><i class="mdi mdi-sofa"></i> Beds : <strong>3</strong></span><span><i class="mdi mdi-scale-bathroom"></i> Baths : <strong>2</strong></span><span><i class="mdi mdi-move-resize-variant"></i> Area : <strong>587 sq ft</strong></span></div></a> </div>' +
            '</div>' +
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 300
        });
        var image = 'https://askbootstrap.com/preview/osahan-land/img/marker.png';
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: image
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }
  </script>

<script>
        function switchIcon() {
            $("#acc1").toggleClass("far fas");
        }
    </script>
  

    <!--up-->
    <!-- <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () { scrollFunction() };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("myBtn").style.display = "block";
                } else {
                    document.getElementById("myBtn").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script> -->
</body>

</html>