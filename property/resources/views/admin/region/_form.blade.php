<div class="box-body">
    <label>name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="name" class="form-control" placeholder="name"
      @if(isset($region))
        value="{{$region->name}}"
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
  <label>City</label>
  <select class="form-control" name="city">
    @foreach($city as $ci)
    <option value="{{$ci->id}}"
    @if(isset($region))
      @if($region->city_id==$ci->id)
        selected
      @endif
    @endif
    >{{$ci->name}}</option>
    @endforeach
  </select>
  @if ($errors->has('city'))
      <span class="help-block">
          <strong>{{ $errors->first('city') }}</strong>
      </span>
  @endif
</div>
@push ('scripts')
<script>
</script>
@endpush
