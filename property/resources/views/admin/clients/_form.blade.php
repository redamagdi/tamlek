<div class="box-body">
    <label>Client name</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="name" class="form-control" placeholder="name"
      @if(isset($client))
        value="{{$client->name}}"
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
      @if(isset($client))
        value="{{$client->email}}"
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
  <label>Phone</label>
  <div class="input-group">
    <span class="input-group-addon">
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </span>
    <input type="text" name="mobile" class="form-control" placeholder="phone"
    @if(isset($client))
      value="{{$client->mobile}}"
    @endif
    >
  </div>
  @if ($errors->has('phone'))
      <span class="help-block">
          <strong>{{ $errors->first('phone') }}</strong>
      </span>
  @endif
</div>
<div class="box-body">
    <label>Area</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="area" class="form-control" placeholder="Area"
      @if(isset($client))
        value="{{$client->area}}"
      @endif
      >
    </div>
    @if ($errors->has('area'))
        <span class="help-block">
            <strong>{{ $errors->first('area') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>Date of birth</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="dateBirth" class="form-control" placeholder="Date of birth"
      @if(isset($client))
        value="{{$client->dateBirth}}"
      @endif
      >
    </div>
    @if ($errors->has('dateBirth'))
        <span class="help-block">
            <strong>{{ $errors->first('dateBirth') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
  <label>Gender</label>
  <select class="form-control" name="gender">
      <option
        @if(isset($client))
          @if($client->gender=="male")
            selected
          @endif
        @endif
      >Male</option>
      <option
      @if(isset($client))
        @if($client->gender=="female")
          selected
        @endif
      @endif
      >Female</option>
    </select>
  @if ($errors->has('gender'))
      <span class="help-block">
          <strong>{{ $errors->first('gender') }}</strong>
      </span>
  @endif
</div>
<div class="box-body">
  <label>Blocked</label>
  <select class="form-control" name="block">
    <option value="1"
      @if(isset($client))
        @if($client->block==1)
          selected
        @endif
      @endif
      >Yes</option>
    <option value="0"
      @if(isset($client))
        @if($client->block==0)
          selected
        @endif
      @endif
    >No</option>
  </select>
  @if ($errors->has('block'))
      <span class="help-block">
          <strong>{{ $errors->first('block') }}</strong>
      </span>
  @endif
</div>
<div class="box-body">
  <label>Active</label>
  <select class="form-control" name="active">
    <option value="1"
      @if(isset($client))
        @if($client->active==1)
          selected
        @endif
      @endif
    >Yes</option>
    <option value="0"
    @if(isset($client))
      @if($client->active==0)
        selected
      @endif
    @endif
    >No</option>
  </select>
  @if ($errors->has('active'))
      <span class="help-block">
          <strong>{{ $errors->first('active') }}</strong>
      </span>
  @endif
</div>

<div class="box-body">
    <label>Credit number</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="number" class="form-control" placeholder="Credit number"
      @if(isset($client))
        value="{{$client->bank->number}}"
      @endif
      >
    </div>
    @if ($errors->has('number'))
        <span class="help-block">
            <strong>{{ $errors->first('number') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>CVR</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="cvr" class="form-control" placeholder="CVR"
      @if(isset($client))
        value="{{$client->bank->cvr}}"
      @endif
      >
    </div>
    @if ($errors->has('cvr'))
        <span class="help-block">
            <strong>{{ $errors->first('cvr') }}</strong>
        </span>
    @endif
</div>
<div class="box-body">
    <label>Expire date</label>
    <div class="input-group">
      <span class="input-group-addon">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
      </span>
      <input type="text" name="date" class="form-control" placeholder="Expire date"
      @if(isset($client))
        value="{{$client->bank->date}}"
      @endif
      >
    </div>
    @if ($errors->has('date'))
        <span class="help-block">
            <strong>{{ $errors->first('date') }}</strong>
        </span>
    @endif
</div>

@push ('scripts')
<script>
</script>
@endpush
