@extends ('admin.layouts.app')

@section ('title', '- فئات التطوع')

@section ('header')
<a href="{{ route('priority.create') }}" class="btn btn-link btn-float has-text">
    <i class="fa fa-plus"></i>
    <span>Add new priority</span>
</a>
@endsection


@section('content')
<div class="panel-heading">
    Manage all priority
</div>
  <table class="table table-striped table-bordered  dt-responsive" width="100%" id="sample_1">
    <thead>
        <tr>
            <th>Priority name</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
      @foreach($priority as $pr)
      <tr>
          <td>{{$pr->name}}</td>
          <td>

            <button class="btn btn-danger btn-float has-text" onclick="deletePriority({{$pr->id}})">
                <i class="fa fa-times"></i>
                <span>delete</span>
            </button>
            <a href="{{ route('priority.edit',['id'=>$pr]) }}" class="btn btn-primary btn-float has-text">
                <i class="fa fa-pencil"></i>
                <span>update</span>
            </a>
            <form method="post" action="{{route('priority.destroy',['id'=>$pr->id])}}" class="hidden" id="priorityForm{{$pr->id}}">
              {!!csrf_field()!!}
              <input type="hidden" name="_method" value="delete">
            </form>
          </td>
      </tr>
      @endforeach
    </tbody>
</table>
@endsection
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
@section('scripts')

<script type="text/javascript" src="{{ asset('js/plugins/tables/datatables/datatables.min.js') }}"></script>

<script>
function deletePriority(id)
{
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover it!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      $("#priorityForm"+id).submit()
    } else {
      swal("This priority is safe!");
    }
  });
}

$(document).on('pjax:success', function (xhr, textStatus, options) {
    swal.close();
});

$('[data-toggle="popover"]').popover();


</script>
@endsection
