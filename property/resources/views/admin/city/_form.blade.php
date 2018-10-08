<div class="box-body">
    <label>name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="name" class="form-control" placeholder="name"
      @if(isset($city))
        value="{{$city->name}}"
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
  <select class="form-control" name="state">
    @foreach($state as $st)
    <option value="{{$st->id}}"
    @if(isset($city))
      @if($city->state_id==$st->id)
        selected
      @endif
    @endif
    >{{$st->name}}</option>
    @endforeach
  </select>
  @if ($errors->has('state'))
      <span class="help-block">
          <strong>{{ $errors->first('state') }}</strong>
      </span>
  @endif
</div>
@push ('scripts')
<script>
</script>
@endpush
