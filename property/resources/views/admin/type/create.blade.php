@extends ('admin.layouts.app')
@section('content-header')
<a class="btn btn-primary btn-float has-text submit">
    <i class="fa fa-plus"></i>
    <span>Save </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Type</a></li>
    <li class="active">Create</li>
  </ol>
@endsection
@section('content')
<div class="panel-heading">
    Add new type
</div>
<div class="box">
{!! Form::open(['id' => 'saveNewUser', 'route' => 'type.store','files' => true]) !!}
    @include('admin.type._form')
{!! Form::close() !!}
</div>
@endsection
@section('script')
  function deleteUser($id)
  {
    alert("d");
  }
  $(".submit").click(function()
  {
    $("#saveNewUser").submit();
  });
@endsection
