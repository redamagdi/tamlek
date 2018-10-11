<!--===============================================================================================-->
<!-- search  -->
<!--===============================================================================================-->


<form method="POST" action="{{ route('search.property') }}">
 {{ csrf_field() }}
    <div class="search-box">
    <section class="search-banner  text-white wow zoomIn  " id="search-banner">
    <div class="container py-5 ">
    <div class="row  ">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-body1">
                <div class="row   ">
                    <div class="col-sm-9  order-sm-1 ">
                        <div class="block d-flex space1">
                            <select multiple name="citiesandregions[]" id="e1" class="form-control heit  rr " id="search"
                                placeholder="City or Town or District ">
                                @foreach($cities as $city)
                                <option value=" {{$city['id']}}|1">{{ $city['name'] }}
                                </option>

                                  @foreach($city->regions as $region )

                                    <option value=" {{$region['id']}}|0">{{ $region['name'] }}
                                   </option>

                                  @endforeach
                                @endforeach
                                
                            </select>

                            <button class="btn btn-tamlik" style="padding: 1px 39px;">Find <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-3 order-sm-0    ">
                        <div class="form-group ">
                            <select class="form-control ">
                                <optgroup label="Search type">

                                    <option>Buy</option>
                                    <option>Commercial buy
                                    </option>

                                    </option>
                                </optgroup>

                            </select>
                        </div>
                    </div>

                </div>
                <div class="row  ">
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="form-group ">
                            <select class="form-control" name="properitytype_id">
                                
                                <option value="" selected>Property Type</option>
                                @foreach($propertytypes as $protype)
                                  <option value="{{ $protype['id'] }}">{{ $protype->name->first()->name }}</option>
                                @endforeach
                                    
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3  col-sm-6 col-xs-6">
                        <div class="form-group ">
                            <select id="inputState" class="form-control" name="propertystat">
                                <option value="">Select Properity State </option>
                                <option value="0">Under construction
                                </option>
                                <option value="1">Ready</option>

                            </select>
                        </div>
                    </div>


                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-group ">
                            <select id="inputState" name="minprice" class="form-control">
                                <option selected value="">Min. Price</option>
                                <option value="100">100K</option>
                                <option value="200">200K</option>
                                <option value="300">300k</option>
                                <option value="400">400k</option>
                                <option value="500">500k</option>
                                <option value="750">750k</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6 ">
                        <div class="form-group ">
                            <select name="maxprice" id="inputState" class="form-control">
                                <option selected value="">Max. Price</option>
                                <option value="100">100K</option>
                                <option value="200">200K</option>
                                <option value="300">300k</option>
                                <option value="400">400k</option>
                                <option value="500">500k</option>
                                <option value="750">750k</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-6 ">
                        <div class="form-group ">
                            <select name="minbed" id="inputState" class="form-control">
                                <option selected value="">Min. bed</option>
                                <option value="1">1 Bedroom</option>
                                <option value="2">2 Bedroom</option>
                                <option value="3">3 Bedroom</option>
                                <option value="4">4 Bedroom</option>
                                <option value="5">5 Bedroom</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 ">
                        <div class="form-group ">
                            <select name="maxbed" id="inputState" class="form-control">
                                <option selected value="">Max. bed</option>
                                <option value="1">1 Bedroom</option>
                                <option value="2">2 Bedroom</option>
                                <option value="3">3 Bedroom</option>
                                <option value="4">4 Bedroom</option>
                                <option value="5">5 Bedroom</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3   ">
                        <div class="form-group ">
                            <select name="maxarea" id="inputState" class="form-control">
                                <option selected value="">Max. area</option>
                                <option value="50">50 Sqm</option>
                                <option value="100"> 100 Sqm</option>
                                <option value="200">200 Sqm</option>
                                <option value="300">300 Sqm</option>
                                <option value="400">400 Sqm</option>
                                <option value="500">500 Sqm</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <input type="text" class="form-control heit  " name="keyword" id="search" placeholder="Key word ">
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </section>  
    </div>
</form>