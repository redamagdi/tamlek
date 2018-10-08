@extends ('admin.layouts.app')
@section('content-header')

@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manage all clients</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Block</th>
            <th>Active</th>
            <th>Manage</th>
          </tr>
          </thead>
          <?php
          $i=1;
          ?>
          @foreach($clients as $client)
            <tr>
              <td>{{$i}}</td>
              <td>{{$client->name}}</td>
              <td>{{$client->email}}</td>
              <td>{{$client->mobile}}</td>
              <td>{{$client->gender}}</td>
              <td>
                @if($client->block=="1")
                Yes
                @else
                No
                @endif
              </td>
              <td>
                @if($client->active=="1")
                Yes
                @else
                No
                @endif
                <td>
                  <button class="btn btn-danger btn-float has-text" onclick="deleteClient({{$client->id}})">
                      <i class="fa fa-times"></i>
                      <span>delete</span>
                  </button>
                  <a href="{{ route('clients.edit',['id'=>$client->id]) }}" class="btn btn-primary btn-float has-text">
                      <i class="fa fa-pencil"></i>
                      <span>edit</span>
                  </a>
                  <form method="post" action="{{route('clients.destroy',['id'=>$client])}}" class="hidden" id="clientsForm{{$client->id}}">
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
        {!! $clients->render() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@endsection
@section('script')
  function deleteClient(id)
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
          $("#clientsForm"+id).submit();
        } else {
          swal("this client is safe!");
        }
      });
    }
  $(document).on('pjax:success', function (xhr, textStatus, options) {
      swal.close();
  });

  $('[data-toggle="popover"]').popover();

@endsection
