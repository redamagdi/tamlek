@extends ('admin.layouts.app')
@section('content-header')
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Tickets</a></li>
    <li class="active">Show</li>
  </ol>
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manage all tickets</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Client name</th>
            <th>Client gender</th>
            <th>Route name</th>
            <th>Date</th>
            <th>Start at</th>
            <th>End at</th>
            <th>Cost</th>
            <th>Deactivate</th>
            <th>Manage</th>
          </tr>
          </thead>
          <?php
          $i=1;
          ?>
          @foreach($tickets as $ticket)
            <tr>
              <td>{{$i}}</td>
              <td>{{$ticket->client->name}}</td>
              <td>{{$ticket->client->gender}}</td>
              <td>{{$ticket->route->name}}</td>
              <td>{{$ticket->route->date}}</td>
              <td>{{$ticket->route->startAt}}</td>
              <td>{{$ticket->route->endAt}}</td>
              <td>{{$ticket->cost}}</td>
              <td>
                @if($ticket->active=="0")
                <i class="fa fa-check"></i>
                @endif
              </td>

                <td>
                  <button class="btn btn-danger btn-float has-text" onclick="deleteTicket({{$ticket->id}})">
                      <i class="fa fa-times"></i>
                      <span>delete</span>
                  </button>
                  <a href="{{ route('tickets.edit',['id'=>$ticket->id]) }}" class="btn btn-primary btn-float has-text">
                      <i class="fa fa-pencil"></i>
                      <span>edit</span>
                  </a>
                  @if($ticket->active=="1")
                  <a href="{{ route('tickets.active',['id'=>$ticket->id,'active'=>'0']) }}" class="btn btn-danger btn-float has-text">
                      <span>Deactivate</span>
                  </a>
                  @else
                  <a href="{{ route('tickets.active',['id'=>$ticket->id,'active'=>'1']) }}" class="btn btn-primary btn-float has-text">
                      <span>Activate</span>
                  </a>
                  @endif
                  <form method="post" action="{{route('tickets.destroy',['id'=>$ticket])}}" class="hidden" id="ticketsForm{{$ticket->id}}">
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
        {!! $tickets->render() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@endsection
@section('script')
  function deleteTicket(id)
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
        $("#ticketsForm"+id).submit();
      } else {
        swal("this ticket is safe!");
      }
    });
  }



  $(document).on('pjax:success', function (xhr, textStatus, options) {
      swal.close();
  });
  $('[data-toggle="popover"]').popover();

@endsection
