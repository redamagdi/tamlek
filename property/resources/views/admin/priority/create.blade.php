@extends ('admin.layouts.app')

@section ('title', '- إضافة فئه جديده')
@section ('header')


    <a href="{{ route('taskType.index') }}" class="btn btn-link btn-float has-text">
        <i class="fa fa-arrow-left"></i>
        <span>Cancel</span>
    </a>

    <button type="submit" class="btn btn-link btn-float has-text submit">
        <i class="fa fa-plus"></i>
        <span>Save</span>
    </button>
@endsection

@section ('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Add new priority
        </div>

        {!! Form::open(['class' => 'form-horizontal', 'data-form-pjax', 'files' => true,
            'role' => 'form', 'id' => 'add-priority', 'route' => 'priority.store']) !!}
        <div class="panel-body">
            @include ('admin.priority._form')
        </div>

        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
<script>
    function deleteProduct(id) {
        swal({!! json_encode([
            'title' => "هل تريد بالتأكيد حذف المحافظه",
            'text' => "في حال تم الحذف لا يمكن إستعادته مرة أخرى.",
            'type' => 'warning',
            'showCancelButton' => true,
            'cancelButtonText' => "إلغاء",
            'confirmButtonText' => "حذف",
            'confirmButtonColor' => "#DD6B55",
            'closeOnConfirm' => false,
            'closeOnCancel' => true,
            'showLoaderOnConfirm' => true
        ]) !!}, function (confirm) {
            if (confirm) {
                    $('#deleteProduct').submit();            }
        });
    }

    $(document).on('pjax:success', function (xhr, textStatus, options) {
        swal.close();
    });

    $('[data-toggle="popover"]').popover();

    $('.submit').click(function() {

        $('#add-priority').submit();
    });

</script>
@endsection
