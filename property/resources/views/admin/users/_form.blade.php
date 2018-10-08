<div class="box-body">
    <label>User name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="name" class="form-control" placeholder="name"
      @if(isset($user))
        value="{{$user->name}}"
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
    <label>Email</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="email" name="email" class="form-control" placeholder="email"
      @if(isset($user))
        value="{{$user->email}}"
      @endif
      >
    </div>
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>Password</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="password" name="password" class="form-control" placeholder="password">
    </div>
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
  <label>Position</label>
  <select class="form-control" name="type">
    <option value="0"
    @if(isset($user))
      @if($user->type=="0")
        selected
      @endif
    @endif
    >Super admin</option>
    <option value="1"
    @if(isset($user))
      @if($user->type=="1")
        selected
      @endif
    @endif
    >Admin</option>
  </select>
  @if ($errors->has('position'))
      <span class="help-block">
          <strong>{{ $errors->first('position') }}</strong>
      </span>
  @endif
</div>
@push ('scripts')
<script>
</script>
@endpush
