@extends ('admin.layouts.app')
@section('content-header')
<a class="btn btn-primary btn-float has-text submit">
    <i class="fa fa-plus"></i>
    <span>Update </span>
</a>
<a class="btn btn-primary btn-float has-text submit" href="{{route('property.index')}}">
    <i class="fa fa-arrow-left"></i>
    <span>Back </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">property</a></li>
    <li class="active">Edit</li>
  </ol>
@endsection
@section('content')
<div class="box">
{!! Form::open(['data-form-pjax', 'role' => 'form', 'id' => 'edit',
'method' => 'PATCH','files' => true, 'route' => ['property.update', 'ad' => $property->id]]) !!}
  <input type="hidden" name="id" value="{{$property->id}}">
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
    $("#edit").submit();
  });
  function deleteImage(id)
  {
    $.ajax({
              type: "get",
              url: "/deleteImage",
              data: 'data='+id,
              success: function(result)
              {
                alert(result);
                $("#image"+id).remove();
              }
          });

  }
@endsection
