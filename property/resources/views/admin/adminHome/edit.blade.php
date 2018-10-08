@extends ('admin.layouts.app')

@section ('title', '- إضافة فئه جديده')
@section ('header')


    <a href="{{ route('action.index') }}" class="btn btn-link btn-float has-text">
        <i class="fa fa-arrow-left"></i>
        <span>Cancel</span>
    </a>

    <button type="submit" class="btn btn-link btn-float has-text submit">
        <i class="fa fa-plus"></i>
        <span>Update</span>
    </button>
    <button type="submit" class="btn btn-link btn-danger has-text" onclick="deleteAction()">
        <i class="fa fa-times"></i>
        <span>Delete</span>
    </button>
    <form method="post" action="{{route('action.destroy',['id'=>$action])}}" class="hidden" id="actionForm">
      {!!csrf_field()!!}
      <input type="hidden" name="_method" value="delete">
    </form>
@endsection

@section ('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit {{$action->name}}
        </div>
        {!! Form::open(['class' => 'form-horizontal', 'data-form-pjax', 'role' => 'form', 'id' => 'edit',
        'method' => 'PATCH', 'route' => ['action.update', 'action' => $action]]) !!}
        <input type="hidden" name="id" value="{{$action->id}}">
        <div class="panel-body">
            @include ('admin.action._form')
        </div>

        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
<script>
    function deleteAction()
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
          $("#actionForm").submit()
        } else {
          swal("This action is safe!");
        }
      });
    }

    $(document).on('pjax:success', function (xhr, textStatus, options) {
        swal.close();
    });

    $('[data-toggle="popover"]').popover();

    $('.submit').click(function()
    {
        $('#edit').submit();
    });

</script>
@endsection
