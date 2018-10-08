<div class="box-body">
    <label>name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="name" class="form-control" placeholder="name"
      @if(isset($state))
        value="{{$state->name}}"
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
  <label>Country</label>
  <select class="form-control" name="country">
    @foreach($country as $coun)
    <option value="{{$coun->id}}"
    @if(isset($state))
      @if($state->country_id==$coun->id)
        selected
      @endif
    @endif
    >{{$coun->name}}</option>
    @endforeach
  </select>
  @if ($errors->has('country'))
      <span class="help-block">
          <strong>{{ $errors->first('country') }}</strong>
      </span>
  @endif
</div>
@push ('scripts')
<script>
</script>
@endpush
