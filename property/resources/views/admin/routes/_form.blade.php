<div class="box-body">
    <label>Name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="name" class="form-control" placeholder="Name"
      @if(isset($route))
        value="{{$route->name}}"
      @endif
      >
    </div>
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>Origin</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="source" class="form-control" placeholder="Origin"
      @if(isset($route))
        value="{{$route->source}}"
      @endif
      >
    </div>
    @if ($errors->has('source'))
        <span class="help-block">
            <strong>{{ $errors->first('source') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>Destination</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="destination" class="form-control" placeholder="Destination"
      @if(isset($route))
        value="{{$route->destination}}"
      @endif
      >
    </div>
    @if ($errors->has('destination'))
        <span class="help-block">
            <strong>{{ $errors->first('destination') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>Driver name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="driverName" class="form-control" placeholder="Driver name"
      @if(isset($route))
        value="{{$route->driverName}}"
      @endif
      >
    </div>
    @if ($errors->has('driverName'))
        <span class="help-block">
            <strong>{{ $errors->first('driverName') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>Date</label>
    <div class="input-group">
        <div id="filterDate2">
          <!-- Datepicker as text field -->
          <div class="input-group date form-group" data-date-format="dd.mm.yyyy">
            <div class="input-group-addon" >
              <span class="glyphicon glyphicon-th"></span>
            </div>
            <input type="text" class="form-control" name="date" placeholder="dd/mm/yyyy"
            @if(isset($route))
              value="{{$route->date}}"
            @endif
            >
          </div>
        </div>
    </div>
    @if ($errors->has('date'))
        <span class="help-block">
            <strong>{{ $errors->first('date') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>Start at</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-clock-o"></i>
      </span>
      <input type="time" name="startAt" class="form-control" placeholder="Start at"
      @if(isset($route))
        value="{{$route->startAt}}"
      @endif
      >
    </div>
    @if ($errors->has('startAt'))
        <span class="help-block">
            <strong>{{ $errors->first('startAt') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>End at</label>
    <div class="input-group">
      <span class="input-group-addon">
          <i class="fa fa-clock-o"></i>
      </span>
      <input type="time" name="endAt" class="form-control" placeholder="End at"
      @if(isset($route))
        value="{{$route->endAt}}"
      @endif
      >
    </div>
    @if ($errors->has('endAt'))
        <span class="help-block">
            <strong>{{ $errors->first('endAt') }}</strong>
        </span>
    @endif
</div>
