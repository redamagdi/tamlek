@extends ('admin.layouts.app')
@section('content-header')
<a class="btn btn-primary btn-float has-text submit">
    <i class="fa fa-plus"></i>
    <span>Save </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Property</a></li>
    <li class="active">Create</li>
  </ol>
@endsection
@section('content')
<div class="box">
  <div class="panel-heading">
      <label>Add new property</label>
  </div>
{!! Form::open(['id' => 'saveNewUser', 'route' => 'property.store','files' => true]) !!}
    @include('admin.property._form')
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
  function deleteImage(id)
  {
    alert(id);
  }
@endsection
