<div class="box-body">
    <label>Feature name</label>
    <div class="input-group">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#nameEn">Feature</a></li>
        <li><a data-toggle="tab" href="#nameAr">الميزه</a></li>
      </ul>
      <div class="tab-content">
        <div id="nameEn" class="tab-pane fade in active">
          <input type="text" class="form-control" style="margin-top:1%;" placeholder="name" name="nameEn"
          @if(isset($feature))
            value="{{$feature->name('en')->first()->name}}";
          @endif
          >
        </div>
        <div id="nameAr" class="tab-pane fade">
          <input type="text" class="form-control" style="margin-top:1%;" placeholder="الاسم" name="nameAr"
          @if(isset($feature))
            value="{{$feature->name('ar')->first()->name}}";
          @endif
          >
        </div>
      </div>
    </div>
    @if ($errors->has('nameEn'))
        <span class="help-block">
            <strong>{{ $errors->first('nameEn') }}</strong>
        </span>
    @endif
    @if ($errors->has('nameAr'))
        <span class="help-block">
            <strong>{{ $errors->first('nameAr') }}</strong>
        </span>
    @endif
</div>
