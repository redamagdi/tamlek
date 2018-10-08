<div class="box-body">
    <label>header</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="name" class="form-control" placeholder="header"
      @if(isset($ad))
        value="{{$ad->header}}"
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
    <label>Image</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="file" name="image" class="form-control">
    </div>
    @if ($errors->has('image'))
        <span class="help-block">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
    @endif
    @if(isset($ad))
      <image src="{{asset($ad->image)}}">
    @endif
    >

</div>
<div class="box-body">
  <label>Page</label>
  <select class="form-control" name="page">
    @foreach($page as $pa)
    <option value="{{$pa->id}}"
    @if(isset($ad))
      @if($ad->page_id==$pa->id)
        selected
      @endif
    @endif
    >{{$pa->name}}</option>
    @endforeach
  </select>
  @if ($errors->has('page'))
      <span class="help-block">
          <strong>{{ $errors->first('page') }}</strong>
      </span>
  @endif
</div>
@push ('scripts')
<script>
</script>
@endpush
