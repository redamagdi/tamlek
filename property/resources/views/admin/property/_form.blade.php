<div class="box-body">
<ul class="nav nav-pills">
    <li class="active col-md-4" ><a data-toggle="pill" href="#home">General</a></li>
    <li class="col-md-2"><a data-toggle="pill"  href="#menu1">Location</a></li>
    <li class="col-md-2"><a data-toggle="pill" href="#menu2">Images</a></li>
    <li class="col-md-2"><a data-toggle="pill" href="#menu3">Feature</a></li>
</ul>
</div>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="box-body">
        <label>Select type</label>
        <select class="form-control" name="type">
          <option value="">select type</option>
          @foreach ($types as $type)
            <option value="{{$type->id}}"
              @if(isset($property))
                @if($property->type_id==$type->id)
                  selected
                @endif
              @endif
              >{{$type->name->first()->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="box-body">
        <label>Select display</label>
        <select class="form-control" name="display">
          <option value="0"
          @if(isset($property))
            @if($property->type==0)
              selected
            @endif
          @endif
          >Normal</option>
          <option value="1"
          @if(isset($property))
            @if($property->type==1)
              selected
            @endif
          @endif
          >Medium</option>
          <option value="2"
          @if(isset($property))
            @if($property->type==2)
              selected
            @endif
          @endif
          >VIP</option>
        </select>
      </div>
      <div class="box-body">
          <label>Property header</label>
          <div class="input-group">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#headerEn">header</a></li>
              <li><a data-toggle="tab" href="#headerAr">العنوان</a></li>
            </ul>
            <div class="tab-content">
              <div id="headerEn" class="tab-pane fade in active">
                <input type="text" class="form-control" style="margin-top:1%;" placeholder="header" name="headerEn"
                @if(isset($property))
                  value="{{$property->header('en')->first()->name}}";
                @endif
                >
              </div>
              <div id="headerAr" class="tab-pane fade">
                <input type="text" class="form-control" style="margin-top:1%;" placeholder="العنوان" name="headerAr"
                @if(isset($property))
                  value="{{$property->header('ar')->first()->name}}";
                @endif
                >
              </div>
            </div>
          </div>
      </div>
      <div class="box-body">
          <label>Property label</label>
          <div class="input-group">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#labelEn">label</a></li>
              <li><a data-toggle="tab" href="#labelAr">وصف بسيط</a></li>
            </ul>
            <div class="tab-content">
              <div id="labelEn" class="tab-pane fade in active">
                <input type="text" class="form-control" style="margin-top:1%;" placeholder="label" name="labelEn"
                @if(isset($property))
                  value="{{$property->label('en')->first()->name}}";
                @endif
                >
              </div>
              <div id="labelAr" class="tab-pane fade">
                <input type="text" class="form-control" style="margin-top:1%;" placeholder="وصف بسيط" name="labelAr"
                @if(isset($property))
                  value="{{$property->label('ar')->first()->name}}";
                @endif
                >
              </div>
            </div>
          </div>
      </div>
      <div class="box-body">
          <label>Property description</label>
          <div class="input-group">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#descEn">description</a></li>
              <li><a data-toggle="tab" href="#descAr">الوصف</a></li>
            </ul>
            <div class="tab-content">
              <div id="descEn" class="tab-pane fade in active">
                <textarea class="form-control" name="descEn" style="margin-top:1%">@if(isset($property)){{$property->description('en')->first()->name}}@endif</textarea>
              </div>
              <div id="descAr" class="tab-pane fade">
                <textarea class="form-control" name="descAr" style="margin-top:1%">
                  @if(isset($property))
                    {{$property->description('ar')->first()->name}}
                  @endif
                </textarea>
              </div>
            </div>
          </div>
      </div>
      <div class="box-body">
        <label>Cost</label>
        <input type="text" name="cost" class="form-control" placeholder="cost"
        @if(isset($property))
          value="{{$property->cost}}"
        @endif)
        >
      </div>
      <div class="box-body">
        <label>Area</label>
        <input type="text" name="area" class="form-control" placeholder="area"
        @if(isset($property))
          value="{{$property->area}}"
        @endif)
        >
      </div>
      <div class="box-body">
        <label>Reference</label>
        <input type="text" name="reference" class="form-control" placeholder="reference"
        @if(isset($property))
          value="{{$property->reference}}"
        @endif)
        >
      </div>
      <div class="box-body">
        <label>Rooms</label>
        <input type="number" name="room" class="form-control" placeholder="Number of rooms"
        @if(isset($property))
          value="{{$property->room}}"
        @endif)
        >
      </div>
      <div class="box-body">
        <label>Bathroom</label>
        <input type="number" name="bathroom" class="form-control" placeholder="Number of bathroom"
        @if(isset($property))
          value="{{$property->bathroom}}"
        @endif)
        >
      </div>

    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="box-body">
        <label>Select region</label>
        <select class="form-control" name="region">
          <option value="">select region</option>
          @foreach ($regions as $region)
            <option value="{{$region->id}}"
              @if(isset($property))
                @if($property->region_id==$region->id)
                  selected
                @endif
              @endif
              >{{$region->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="box-body">
        <label>Map</label>
        <input type="number" name="map" class="form-control" placeholder="Map link"
        @if(isset($property))
          value="{{$property->map}}"
        @endif
        >
      </div>

    </div>
    <div id="menu2" class="tab-pane fade">
      <div class="box-body">
        <label>Images</label>
        <input type="file" name="Images[]" class="form-control" multiple>
      </div>
      @if(isset($property))
      <div class="box-body">
          @foreach ($property->images as $image)
            <div class='col-md-3' id="image{{$image->id}}">
              <img src="{{asset($image->path)}}" style="max-width:100%;height:50px">
              <button type="button" class="btn btn-dangar" onclick="deleteImage({{$image->id}})">X</button>
            </div>
          @endforeach
      </div>
      @endif
    </div>
    <div id="menu3" class="tab-pane fade">
      <div class="box-body">
        @foreach ($feature as $fe)
            <input type="checkbox" style="margin:4px 10px 0" name=feature[] value="{{$fe->id}}"
            @if(@isset($property))
              @if(($property->feature->pluck('id'))->contains($fe->id))
                checked
              @endif
            @endif
            ><label>{{$fe->name->first()->name}}</label><br>
        @endforeach
      </div>
    </div>
  </div>
</div>

<div class="box-body">
  @if ($errors->has('type'))
      <span class="help-block">
          <strong>{{ $errors->first('type') }}</strong>
      </span>
  @endif
  @if ($errors->has('headerEn'))
      <span class="help-block">
          <strong>{{ $errors->first('headerEn') }}</strong>
      </span>
  @endif
  @if ($errors->has('headerAr'))
      <span class="help-block">
          <strong>{{ $errors->first('headerAr') }}</strong>
      </span>
  @endif
  @if ($errors->has('labelEn'))
      <span class="help-block">
          <strong>{{ $errors->first('labelEn') }}</strong>
      </span>
  @endif
  @if ($errors->has('labelAr'))
      <span class="help-block">
          <strong>{{ $errors->first('labelAr') }}</strong>
      </span>
  @endif
  @if ($errors->has('descEn'))
      <span class="help-block">
          <strong>{{ $errors->first('descEn') }}</strong>
      </span>
  @endif
  @if ($errors->has('descAr'))
      <span class="help-block">
          <strong>{{ $errors->first('descAr') }}</strong>
      </span>
  @endif
  @if ($errors->has('cost'))
      <span class="help-block">
          <strong>{{ $errors->first('cost') }}</strong>
      </span>
  @endif
  @if ($errors->has('area'))
      <span class="help-block">
          <strong>{{ $errors->first('area') }}</strong>
      </span>
  @endif
  @if ($errors->has('reference'))
      <span class="help-block">
          <strong>{{ $errors->first('reference') }}</strong>
      </span>
  @endif
  @if ($errors->has('room'))
      <span class="help-block">
          <strong>{{ $errors->first('room') }}</strong>
      </span>
  @endif
  @if ($errors->has('bathroom'))
      <span class="help-block">
          <strong>{{ $errors->first('bathroom') }}</strong>
      </span>
  @endif
  @if ($errors->has('region'))
      <span class="help-block">
          <strong>{{ $errors->first('region') }}</strong>
      </span>
  @endif
  @if ($errors->has('map'))
      <span class="help-block">
          <strong>{{ $errors->first('map') }}</strong>
      </span>
  @endif
  @if ($errors->has('Images'))
      <span class="help-block">
          <strong>{{ $errors->first('Images') }}</strong>
      </span>
  @endif
</div>
