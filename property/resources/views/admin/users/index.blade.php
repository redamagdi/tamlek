@extends ('admin.layouts.app')
@section('content-header')
<a href="{{ route('users.create') }}" class="btn btn-primary btn-float has-text">
    <i class="fa fa-plus"></i>
    <span>Add new </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">User</a></li>
    <li class="active">Show</li>
  </ol>
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manage all users</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Manage</th>
          </tr>
          </thead>
          <?php
          $i=1;
          ?>
          @foreach($users as $user)
            <tr>
              <td>{{$i}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                @if($user->type==0)
                  Super admin
                @else
                  Admin
                @endif
              </td>
                <td>

                  <a href="{{ route('users.edit',['id'=>$user->id]) }}" class="btn btn-primary btn-float has-text">
                      <i class="fa fa-pencil"></i>
                      <span>edit</span>
                  </a>
                  @if($user->active==1)
                  <a href="{{ route('users.activate',['id'=>$user->id,'active'=>0]) }}" class="btn btn-danger btn-float has-text">
                      <span>Deactivate</span>
                  </a>
                  @else
                  <a href="{{ route('users.activate',['id'=>$user->id,'active'=>1]) }}" class="btn btn-primary btn-float has-text">
                      <span>Activate</span>
                  </a>
                  @endif
                  <form method="post" action="{{route('users.destroy',['id'=>$user])}}" class="hidden" id="usersForm{{$user->id}}">
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
        {!! $users->render() !!}
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
