<select class="form-control" name="action">
  @foreach($action as $ac)
    <option value="{{$ac->id}}">{{$ac->name}}</option>
  @endforeach
</select>
@if ($errors->has('action'))
    <span class="help-block">
        <strong>{{ $errors->first('action') }}</strong>
    </span>
@endif
