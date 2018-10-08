<div class="box-body">
    <label>Route</label>
    <div class="input-group">
      <select class="form-control" name="route">
        @foreach($routes as $route)
          <option value="{{$route->id}}"
            @if(isset($ticket))
              @if($ticket->route_id==$route->id)
                selected
              @endif
            @endif
          >{{$route->name}}</option>
        @endforeach
        </select>
    </div>
    @if ($errors->has('route'))
        <span class="help-block">
            <strong>{{ $errors->first('route') }}</strong>
        </span>
    @endif
</div>
