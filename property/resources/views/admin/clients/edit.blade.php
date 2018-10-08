@extends ('admin.layouts.app')
@section('content-header')
<a class="btn btn-primary btn-float has-text submit">
    <i class="fa fa-plus"></i>
    <span>Update </span>
</a>
<a class="btn btn-primary btn-float has-text submit" href="{{route('clients.index')}}">
    <i class="fa fa-arrow-left"></i>
    <span>Back </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">User</a></li>
    <li class="active">Edit</li>
  </ol>
@endsection
@section('content')
<div class="box">
{!! Form::open(['data-form-pjax', 'role' => 'form', 'id' => 'edit',
'method' => 'PATCH', 'route' => ['clients.update', 'status' => $client->id]]) !!}
  <input type="hidden" name="id" value="{{$client->id}}">
  @include('admin.clients._form')
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
    $("#edit").submit();
  });
@endsection
