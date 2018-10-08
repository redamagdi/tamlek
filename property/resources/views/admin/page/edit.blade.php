@extends ('admin.layouts.app')
@section('content-header')
<a class="btn btn-primary btn-float has-text submit">
    <i class="fa fa-plus"></i>
    <span>Update </span>
</a>
<a class="btn btn-primary btn-float has-text submit" href="{{route('page.index')}}">
    <i class="fa fa-arrow-left"></i>
    <span>Back </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">page</a></li>
    <li class="active">Edit</li>
  </ol>
@endsection
@section('content')
<div class="box">
{!! Form::open(['data-form-pjax', 'role' => 'form', 'id' => 'edit',
'method' => 'PATCH', 'route' => ['page.update', 'page' => $page->id]]) !!}
  <input type="hidden" name="id" value="{{$page->id}}">
  @include('admin.page._form')
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
