<div class="form-group">
    <label>Priority</label>
    <div class="input-icon">
        <i class="fa fa-pencil font-green"></i>
        <input type="text" name="name" class="form-control" placeholder="Priority"
        @if(isset($priority))
        value="{{$priority->name}}"
        @endif
        >
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>
@push ('scripts')
<script>
</script>
@endpush
