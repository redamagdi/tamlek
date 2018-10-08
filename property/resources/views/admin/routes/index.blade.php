@extends ('admin.layouts.app')
@section('content-header')
<a href="{{ route('routes.create') }}" class="btn btn-primary btn-float has-text">
    <i class="fa fa-plus"></i>
    <span>Add new </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Routes</a></li>
    <li class="active">Show</li>
  </ol>
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manage all routes</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Origin</th>
            <th>Destination</th>
            <th>Driver name</th>
            <th>Date</th>
            <th>Start at</th>
            <th>End at</th>
            <th>Manage</th>
          </tr>
          </thead>
          <?php
          $i=1;
          ?>
          @foreach($routes as $route)
            <tr>
              <td>{{$i}}</td>
              <td>{{$route->name}}</td>
              <td>{{$route->source}}</td>
              <td>{{$route->destination}}</td>
              <td>{{$route->driverName}}</td>
              <td>{{$route->date}}</td>
              <td>{{$route->startAt}}</td>
              <td>{{$route->endAt}}</td>
                <td>
                  <button class="btn btn-danger btn-float has-text" onclick="deleteRoute({{$route->id}})">
                      <i class="fa fa-times"></i>
                      <span>delete</span>
                  </button>
                  <a href="{{ route('routes.edit',['id'=>$route->id]) }}" class="btn btn-primary btn-float has-text">
                      <i class="fa fa-pencil"></i>
                      <span>edit</span>
                  </a>
                  <form method="post" action="{{route('routes.destroy',['id'=>$route])}}" class="hidden" id="routesForm{{$route->id}}">
                    {!!csrf_field()!!}
                    <input type="hidden" name="_method" value="delete">
                  </form>
                </td>
            </tr>
            <?php
            $i++;
            ?>
          @endforeach
        </table>
        {!! $routes->render() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@endsection
@section('script')
  function deleteRoute(id)
  {
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this data!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete)
      {
        $("#routesForm"+id).submit();
      } else {
        swal("this route is safe!");
      }
    });
  }



  $(document).on('pjax:success', function (xhr, textStatus, options) {
      swal.close();
  });
  $('[data-toggle="popover"]').popover();

@endsection
