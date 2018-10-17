     <!-- html links -->

@include('front.layout.header')
    
     <!-- End of html links -->

<body class="flexcroll home">

    <!-- Navbar -->
      
@include('front.layout.navigationbar')
    
    <!-- End Navbar -->


    <!--  end of Navigation -->

      <!-- search form  -->
@include('front.layout.searchform')
      <!--End of search form  --> 
   

    <!-- ================================================= -->
    <!-- head properties -->
    <!--===============================================================================================-->
    <div class="container wow zoomIn ">
        <ul class="nav-horz mt-3 mb-3 ">
            <li>
                <a href="#"> {{ $proprity->region->city->country['name'] }}
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>

            <li>
                <a href="#">
                    <span> {{ $proprity->region->city['name'] }}
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span> {{ $proprity->region['name'] }}
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
            </li>

        </ul>

    </div>
    <br>
    <!-- ======================================== -->
    <div class=" border-top container wow zoomIn  ">
        <div class="row">
            <div class="col-sm-6">
                    <h2 class="text-left">
                            <span class="heading_dividertext color2 mt-3 ">Renovated {{ $proprity->typeproperity->name->first()['name'] }} for rent in {{ $proprity->region->city->country['name'] }}
                            </span>
                            <p>
                                    {{ $proprity->typeproperity->name->first()['name'] }} for Rent in {{ $proprity->region->city['name'] }} , {{ $proprity->region->city->country['name'] }}
                                    Reference: {{ $proprity['reference'] }}
                                    
                            </p>
                        </h2>
            </div>
            <div class="col-sm-6 ">
                    <div class="btn-box m-2 float-right ">
                            <a  class="color2" >
                                    <i class="fas fa-share-alt fa-2x "></i> share
                            </a>
                        
                        </div>
                    <div  class="btn-box m-2 float-right d-block">
                            <a  class="color2" onclick="switchIcon()">
                                <i id="acc1" class="far fa-heart fa-2x "></i>  save
                            </a>
                        
                        </div>
                     
                </div>
        </div>
      

           
    </div>




    <!-- ================================================================================================== -->
    <!-- Property Single Slider -->
    <!-- =================================== -->


    <section class="wow zoomIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">

                    <div class="card">

                        <div class="card-body osahan-slider pl-0 pr-0 pt-0 pb-0">
                            <div id="osahansliderz" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#osahansliderz" data-slide-to="0" class="active"></li>
                                    <li data-target="#osahansliderz" data-slide-to="1"></li>
                                </ol>

                                <div class="carousel-inner" role="listbox">

                                    <?php $imagepathactive = asset($proprity->images->first()['path']); 
                                     ?>
                                    <div class="carousel-item active rounded" style="background-image: url({{ $imagepathactive  }})">
                                    </div>

                                    @foreach($proprity->images as $image)
                                   <?php $imagepath = asset($image['path']); 
                                   ?>
                                    <div class="carousel-item  rounded" style="background-image: url({{ $imagepath  }})">
                                    </div>
                                    
                                  @endforeach
                                  
                                </div>
                                <a class="carousel-control-prev" href="#osahansliderz" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#osahansliderz" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-sm-6 color1 table-responsive">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="color2 " scope="col ">Facts</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Prise</th>
                                            <td class="font-weight-bold color2">
                                                {{ $proprity['cost'] }} EGP </td>

                                        </tr>
                                        <tr>
                                            <td>Reference</th>
                                            <td class="font-weight-bold"> {{ $proprity['reference'] }}</td>

                                        </tr>
                                        <tr>
                                            <td>Bedrooms</th>
                                            <td class="font-weight-bold">{{ $proprity['bathroom'] }}</td>

                                        </tr>
                                        <td>Bed</th>
                                        <td class="font-weight-bold">{{ $proprity['room'] }}</td>

                                        </tr>
                                        <td>Area</th>
                                        <td class="font-weight-bold">
                                            {{ $proprity['area'] }} sqm</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-6 color1 table-responsive">
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th class="color2 " scope="col ">AMENITIES</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class=" "><i class=" text-success fas fa-check pr-1"></i> Kitchen
                                                Appliances
                                                </th>


                                        </tr>
                                        <tr>
                                            <td class=" "><i class=" text-success fas fa-check pr-1"></i> Central A/C
                                                </th>


                                        </tr>
                                        <tr>
                                            <td class=" "><i class=" text-success fas fa-check pr-1"></i> Balcony
                                                </th>


                                        </tr>
                                        <tr>
                                            <td class=" "><i class=" text-success fas fa-check pr-1"></i> Networked
                                                </th>


                                        </tr>

                                        </tr>
                                        <tr>
                                            <td class=" "><i class=" text-success fas fa-check pr-1"></i> Security
                                                </th>


                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>



                    <div class="card padding-card">


                        <div class="card-body">
                            <h5 class="card-title mb-3 text-center">Description</h5>

                            <p class="p-3">
                             {{ $proprity->description->first()['name'] }}
                            </p>

                        </div>
                    </div>



                    <!-- 
                    <div class="card padding-card">

                        <div class="card-body">
                            <h5 class="card-title mb-3">Features</h5>

                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <ul class="sidebar-card-list">
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                In-room tea and coffee</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Writing desk</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Personal safe</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Minibar</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Refrigerator</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Electronic key card access</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4">

                                    <ul class="sidebar-card-list">
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Refrigerator</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Electronic key card access</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                In-room tea and coffee</a></li>
                                        <li><a href="#"><i class="mdi mdi-close-box-outline text-danger"></i> Writing
                                                desk</a></li>
                                        <li><a href="#"><i class="mdi mdi-close-box-outline text-danger"></i> Personal
                                                safe</a></li>
                                        <li><a href="#"><i class="mdi mdi-close-box-outline text-danger"></i> Minibar</a></li>

                                    </ul>

                                </div>
                                <div class="col-lg-4 col-md-4">

                                    <ul class="sidebar-card-list">
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Personal safe</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Minibar</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Refrigerator</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                In-room tea and coffee</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Writing desk</a></li>
                                        <li><a href="#"><i class="mdi mdi-checkbox-marked-outline text-success"></i>
                                                Electronic key card access</a></li>
                                    </ul>

                                </div>
                            </div>



                        </div>
                    </div> -->



                    <div class="card padding-card wow zoomIn">

                  <div class="card-body">
<h5 class="card-title mb-3 mt-3 text-center">Location</h5>

<div class="row mb-3 p-3 ">
          <div class="col-lg-6 col-md-6">
<p><strong class="text-dark">Address :</strong> {{ $proprity->region->city->country['name'] }} ,{{ $proprity->region->city['name'] }}, {{ $proprity->region['name'] }} </p>
<p><strong class="text-dark">State :</strong> Newcastle</p>
          </div>
          <div class="col-lg-6 col-md-6">
<p><strong class="text-dark">City :</strong>{{ $proprity->region->city['name'] }}</p>
<p><strong class="text-dark">Zip/Postal Code  :</strong> 54330</p>
          </div>
         
</div>

<div id="map"></div>


</div>
                          
                    </div>






                </div>
                <div class="col-lg-4 col-md-4">



                    <div class="card sidebar-card">

                        <div class="card-body">
                            <h5 class="card-title mb-4  mt-3 text-center">About Agent</h5>


                            <div id="featured-properties">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="card card-list">
                                            <a href="#">
                                                <img class="card-img-top" src="{{ asset('frontstyle/img/17.jpg') }}" alt="Card image cap">
                                                <div class="card-body pb-0">
                                                    <h5 class="card-title mb-4 text-center mt-3">Agent name</h5>

                                                    <a id="nr" onclick="call()" class="btn btn-tamlik btn-block">
                                                        <h3 class="text-white"> <i class="fas fa-phone"></i> Call</h3>
                                                    </a>
                                                    <a id="ml" onclick="mail()" class="btn btn-tamlik btn-block mt-1">
                                                        <h5 class="text-white"><i class="fas fa-envelope"></i> Send
                                                            mail</h5>
                                                    </a>
                                                </div>




                                            </a>

                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>




                 @if($properitiesinthesamearearecomended->count() > 0)

                    <div class="card sidebar-card">

                        <div class="card-body">
                            <h5 class="card-title mb-4 mt-3 text-center ">Featured Properties</h5>

                            <div id="featured-properties" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#featured-properties" data-slide-to="0" class="active"></li>
                                    <li data-target="#featured-properties" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner">
                                    
                                    <div class="carousel-item active">
                                        <div class="card card-list">
                                          <?php 
                                            $caractivepath = asset($properitiesinthesamearearecomended->first()->images->first()['path']);
                                          ?>
                                            <a href="{{ route('properity.single',$properitiesinthesamearearecomended->first()['id']) }}">
                                                <span class="badge color11">{{ $properitiesinthesamearearecomended->first()->typeproperity->name->first()['name'] }}</span>
                                                <img style="height: 192px; width: 340px;" class="card-img-top" src="{{ $caractivepath }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $properitiesinthesamearearecomended->first()->typeproperity->name->first()['name'] }} in {{ $properitiesinthesamearearecomended->first()->region['name'] }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i>
                                                        {{ $properitiesinthesamearearecomended->first()->region['name'] }}, {{ $properitiesinthesamearearecomended->first()->region->city['name'] }}, {{ $properitiesinthesamearearecomended->first()->region->city->country['name'] }}</h6>
                                                    <h2 class="color2 mb-0 mt-3">
                                                        {{ $properitiesinthesamearearecomended->first()['cost'] }} EGP<small>/month</small></h2>
                                                </div>

                                            </a>
                                        </div>
                                    </div>

                                    @foreach($properitiesinthesamearearecomended as $recomregoin)

                                      <div class="carousel-item">
                                        <div class="card card-list">
                                          <?php 
                                            $caractivepath = "";
                                            $caractivepath = asset($recomregoin->images->first()['path']);
                                          ?>
                                            <a href="{{ route('properity.single',$recomregoin['id']) }}">
                                                <span class="badge color11">{{ $recomregoin->typeproperity->name->first()['name'] }}</span>
                                                <img style="height: 192px; width: 340px;" class="card-img-top" src="{{ $caractivepath }}" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $recomregoin->typeproperity->name->first()['name'] }} in {{ $recomregoin->region['name'] }}</h5>
                                                    <h6 class="card-subtitle mb-2 text-muted"><i class="mdi mdi-home-map-marker"></i>
                                                        {{ $recomregoin->region['name'] }}, {{ $recomregoin->region->city['name'] }}, {{ $recomregoin->region->city->country['name'] }}</h6>
                                                    <h2 class="color2 mb-0 mt-3">
                                                        {{ $recomregoin['cost'] }} EGP<small>/month</small></h2>
                                                </div>

                                            </a>
                                        </div>
                                    </div>

                                    @endforeach

                                    
                                </div>
                            </div>

                        </div>
                    </div>
                @endif











                </div>
            </div>
        </div>
    </section>
    <!-- End Property Single Slider -->


    <!-- =========================================================================================================== -->
   <!-- More available in the same area -->
    <!-- =============================== -->
    <div class="">
        <div class=" border-bottom   ">
            <h2>
                <span class="heading_dividertext color2 mt-3 "> More available in the same area
                </span></h2>

        </div>
        <!-- Similar Properties -->
        <section class=" mt-5 pb-5 ">
            <div class="container">
                <div class="row">
       @foreach($properitiesinthesamearea as $samearea)

                    <div class="col-lg-3 col-md-3">
                        <div class="card card-list">
                            <a href="{{ route('properity.single',$samearea['id']) }}">

                                <span class="badge bg-dark text-white"> <i class="fas fa-camera"></i> 10</span>
                                <img style="width: 255px; height: 172px;" class="card-img-top" src="{{ asset($samearea->images->first()['path']) }}" alt="Card image cap">
                                <a href="#" class="badge-corner">
                                    <span class="fa fa-thumbs-o-up"></span>
                                    <div class="card-body">
                                        <h5 class="card-title m-3">{{$samearea->header->first()['name'] }}</h5>
                                        <span class="m-3"> {{ $samearea->typeproperity->name->first()['name'] }}  <strong></strong></span>
                                        <span class="m-3"> {{ $samearea['room'] }}<i class="fas fa-bed ml-1"></i> <strong></strong></span>
                                        <span class="m-3">{{ $samearea['bathroom'] }}<i class="fas fa-shower ml-1"></i> <strong></strong></span>
                                        <h4 class=" text-left ml-3 color2">
                                            {{ $samearea['cost']  }} EGP </h4>
                                    </div>

                                </a>
                        </div>
                    </div>

                  @endforeach
                

                 @if($properitiesinthesamearea->count() > 4 )
                   <?php $samearea = "";?>
                  @foreach($extraproperinthesame as $samearea)

                    <div class="col-lg-3 col-md-3">
                        <div class="card card-list">
                            <a href="{{ route('properity.single',$samearea['id']) }}">

                                <span class="badge bg-dark text-white"> <i class="fas fa-camera"></i> 10</span>
                                <img style="width: 255px; height: 172px;" class="card-img-top" src="{{ asset($samearea->images->first()['path']) }}" alt="Card image cap">
                                <a href="#" class="badge-corner">
                                    <span class="fa fa-thumbs-o-up"></span>
                                    <div class="card-body">
                                        <h5 class="card-title m-3">{{$samearea->header->first()['name'] }}</h5>
                                        <span class="m-3"> {{ $samearea->typeproperity->name->first()['name'] }}  <strong></strong></span>
                                        <span class="m-3"> {{ $samearea['room'] }}<i class="fas fa-bed ml-1"></i> <strong></strong></span>
                                        <span class="m-3">{{ $samearea['bathroom'] }}<i class="fas fa-shower ml-1"></i> <strong></strong></span>
                                        <h4 class=" text-left ml-3 color2">
                                            {{ $samearea['cost']  }} EGP </h4>
                                    </div>

                                </a>
                        </div>
                    </div>

                  @endforeach
                @endif


                </div>
        </section>
        <!-- End Similar Properties -->
    </div>

    <!-- -=============================================================-->

    <!-- Join Team -->
    <section class="section-padding bg-dark text-center ">
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
    <!-- google-map -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUsOUkZbTEwLxeUN5Qfag6Vr5BjngCGMY&amp;callback=initMap">

    <script>
        $(document).ready(function () {
            $("#e1").select2();
        })
    </script>
    <!-- end of google map -->
 
    <!--wow-->
    <script>
        $('a.info').tooltip();
        $(document).ready(function () {
        });
        jQuery(document).ready(function () {
        });
        new WOW().init();
    </script>

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
                        color: '#f4f4f'
                    }]
                },
                {
                    elementType: 'labels.text.stroke',
                    stylers: [{
                        color: '#474747'
                    }]
                },
                {
                    elementType: 'labels.text.fill',
                    stylers: [{
                        color: '474747'
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
            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });
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
    <script>

        function call() {
            document.getElementById("nr").innerHTML = "010xxxxxxxxx";
        }


    </script>
    <script>

        function mail() {
            document.getElementById("ml").innerHTML = "info@mail.com";
        }


    </script>

    <script>
        function switchIcon() {
            $("#acc1").toggleClass("far fas");
        }
    </script>

</body>

</html>