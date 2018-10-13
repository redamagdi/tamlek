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
                                <?php $selectedcity = ""; $selectedregion = "";?>
                                @foreach($cities as $city)
                                  
                                  @if( in_array($city['id'] , $citysearchinput ) )
                                    <?php $selectedcity = "selected";  ?>
                                  @endif
                                <option {{ $selectedcity }} value=" {{$city['id']}}|1">{{ $city['name'] }}
                                </option>

                                  @foreach($city->regions as $region )

                                    @if( in_array($region['id'] , $regoinsearchinput ) )
                                    <?php $selectedregion = "selected";  ?>
                                    @endif
                                    <option {{ $selectedregion }} value=" {{$region['id']}}|0">{{ $region['name'] }}
                                   </option>
                                   <?php $selectedregion = "";?>
                                  @endforeach
                                   <?php $selectedcity = "";?>

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
                                
                                <option value="">Property Type</option>
                                <?php $selected = ""; ?>

                                @foreach($propertytypes as $protype)
                                @if(isset($allinfo['properitytype_id']))

                                  @if( $protype['id'] == $allinfo['properitytype_id'])
                                  <?php $selected = "selected"; ?>
                                  @endif
                                 @endif 
                                  <option @if(isset($allinfo['properitytype_id'])) {{ $selected }} @endif value="{{ $protype['id'] }}">{{ $protype->name->first()->name }}</option>
                                <?php $selected = ""; ?>
                                @endforeach
                                    
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3  col-sm-6 col-xs-6">
                        <div class="form-group ">
                            <select id="inputState" class="form-control" name="propertystat">
                                <option value="">Select Properity State </option>
                            @if(isset($allinfo['propertystat'])) 
                                @if( ($allinfo['propertystat'] == 0) &&($allinfo['propertystat'] != null ) )
                                <?php 
                                      $underconst = "selected";
                                      $ready = "";
                                ?>
                                @elseif($allinfo['propertystat'] == 1)
                                <?php 
                                      $underconst = "";
                                      $ready = "selected";
                                ?>
                                @endif
                            @endif
                                <option @if(isset($allinfo['propertystat'])) @if(isset($underconst)) {{ $underconst }} @endif @endif value="0">Under construction
                                </option>
                                <option @if(isset($allinfo['propertystat'])) @if(isset($ready)) {{ $ready }} @endif @endif value="1">Ready</option>

                            </select>
                        </div>
                    </div>


                    <div class="col-md-2 col-sm-6 col-xs-6">
                        <div class="form-group ">
                            <select id="inputState" name="minprice" class="form-control">
                                <option value="">Min. Price</option>
                              <?php $selectedd = ""; ?>  
                             @for($i = $minmumprice;$i <= $maxmumprice; $i++)
                              @if( (isset($allinfo['minprice'])) && ($allinfo['minprice'] == $i) )
                              <?php $selectedd = "selected"; ?>
                              @endif

                                <option @if(isset($allinfo['minprice'])) {{ $selectedd }} @endif value="{{ $i }}">{{ $i }}K</option>
                              <?php $selectedd = ""; ?>
                             @endfor   
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-6 ">
                        <div class="form-group ">
                            <select name="maxprice" id="inputState" class="form-control">
                                <option value="">Max. Price</option>
                                <?php $selectedd = ""; ?>  
                             @for($i = $minmumprice;$i <= $maxmumprice; $i++)
                              @if( (isset($allinfo['maxprice'])) && ($allinfo['maxprice'] == $i) )
                              <?php $selectedd = "selected"; ?>
                              @endif

                                <option @if(isset($allinfo['maxprice'])) {{ $selectedd }} @endif value="{{ $i }}">{{ $i }}K</option>
                              <?php $selectedd = ""; ?>
                             @endfor
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-6 col-xs-6 ">
                        <div class="form-group ">
                            <select name="minbed" id="inputState" class="form-control">
                                <option value="">Min. Bedroom</option>
                                
                                <?php $selectedd = ""; ?>  
                             @for($i = $minmumbed;$i <= $maxmumbed; $i++)
                          @if( (isset($allinfo['minbed'])) && ($allinfo['minbed'] == $i) )
                              <?php $selectedd = "selected"; ?>
                              @endif

                                <option @if(isset($allinfo['minbed'])) {{ $selectedd }} @endif value="{{ $i }}">{{ $i }} Bedroom</option>
                              <?php $selectedd = ""; ?>
                             @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 ">
                        <div class="form-group ">
                            <select name="maxbed" id="inputState" class="form-control">
                                <option value="">Max. Bedroom</option>
                                <?php $selectedd = ""; ?>  
                             @for($i = $minmumbed;$i <= $maxmumbed; $i++)
                          @if( (isset($allinfo['maxbed'])) && ($allinfo['maxbed'] == $i) )
                              <?php $selectedd = "selected"; ?>
                              @endif

                                <option @if(isset($allinfo['maxbed'])) {{ $selectedd }} @endif value="{{ $i }}">{{ $i }} Bedroom</option>
                              <?php $selectedd = ""; ?>
                             @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3   ">
                        <div class="form-group ">
                            <select name="maxarea" id="inputState" class="form-control">
                                <option value="">Max. area</option>

                                <?php $selectedd = ""; ?>  
                             @for($i = $minmumarea;$i <= $maxmumarea; $i++)
                          @if( (isset($allinfo['maxarea'])) && ($allinfo['maxarea'] == $i) )
                              <?php $selectedd = "selected"; ?>
                              @endif

                                <option @if(isset($allinfo['maxarea'])) {{ $selectedd }} @endif value="{{ $i }}">{{ $i }} Sqm</option>
                              <?php $selectedd = ""; ?>
                             @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <input type="text" class="form-control heit  " name="keyword" id="search" @if(isset($allinfo['keyword'])) value="{{ $allinfo['keyword'] }}" @endif placeholder="Key word ">
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