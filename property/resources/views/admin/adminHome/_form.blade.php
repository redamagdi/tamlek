<div class="form-group">
    <label>Action</label>
    <div class="input-icon">
        <i class="fa fa-pencil font-green"></i>
        <input type="text" name="name" class="form-control" placeholder="Action"
        @if(isset($action))
        value="{{$action->name}}"
        @endif
        >
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    <label>Task type</label>
    <select class="form-control" name="taskType">
      @foreach($taskType as $type)
        <option value="{{$type->id}}"
          @if(isset($action))
            @if($action->task_types_id==$type->id)
              selected
            @endif
          @endif
          >{{$type->name}}</option>
      @endforeach
    </select>
</div>
@push ('scripts')
<script>
</script>
@endpush
