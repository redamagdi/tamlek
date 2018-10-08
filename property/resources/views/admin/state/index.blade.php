@extends ('admin.layouts.app')
@section('content-header')
<a href="{{ route('state.create') }}" class="btn btn-primary btn-float has-text">
    <i class="fa fa-plus"></i>
    <span>Add new </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">State</a></li>
    <li class="active">Show</li>
  </ol>
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manage all state</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Country</th>
            <th>Manage</th>
          </tr>
          </thead>
          <?php
          $i=1;
          ?>
          @foreach($state as $st)
            <tr>
              <td>{{$i}}</td>
              <td>{{$st->name}}</td>
              <td>{{$st->country->name}}</td>
              <td>

                  <a href="{{ route('state.edit',['id'=>$st->id]) }}" class="btn btn-primary btn-float has-text">
                      <i class="fa fa-pencil"></i>
                      <span>edit</span>
                  </a>
                  <form method="post" action="{{route('state.destroy',['id'=>$st])}}" class="hidden" id="usersForm{{$st->id}}">
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
        {!! $state->render() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@endsection
@section('script')
  function deleteUser(id)
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
        $("#usersForm"+id).submit();
      } else {
        swal("this user is safe!");
      }
    });
  }



  $(document).on('pjax:success', function (xhr, textStatus, options) {
      swal.close();
  });
  $('[data-toggle="popover"]').popover();

@endsection
