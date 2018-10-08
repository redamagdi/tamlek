@extends ('admin.layouts.app')
@section('content-header')
<a href="{{ route('property.create') }}" class="btn btn-primary btn-float has-text">
    <i class="fa fa-plus"></i>
    <span>Add new </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Property</a></li>
    <li class="active">Show</li>
  </ol>
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manage all property</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Header</th>
            <th>Label</th>
            <th>Cost</th>
            <th>Location</th>
            <th>recommend</th>
            <th>Type</th>
            <th>Manege</th>
          </tr>
          </thead>
          <?php
          $i=1;
          ?>
          @foreach($property as $pro)
            <tr>
              <td>{{$i}}</td>
              <td>{{$pro->header->first()->name}}</td>
              <td>{{$pro->label->first()->name}}</td>
              <td>{{$pro->cost}}</td>
              <td>{{$pro->cost}}</td>
              <td>
                @if($pro->recommend==1)
                  <i class="fa fa-check" aria-hidden="true"></i>
                @endif
              </td>
              <td>
                @if($pro->type==0)
                  Normal
                @endif
                @if($pro->type==1)
                  Medium
                @endif
                @if($pro->type==2)
                  VIP
                @endif
              </td>
              <td>
                <button class="btn btn-danger btn-float has-text" onclick="deleteType({{$pro->id}})">
                    <i class="fa fa-times"></i>
                    <span>delete</span>
                </button>
                  <a href="{{ route('property.edit',['id'=>$pro->id]) }}" class="btn btn-primary btn-float has-text">
                      <i class="fa fa-pencil"></i>
                      <span>edit</span>
                  </a>
                  @if($pro->recommend==1)
                    <a href="{{ route('property.recommend',['id'=>$pro->id,'state'=>0]) }}" class="btn btn-primary btn-float has-text">
                        <span>delete recommend</span>
                    </a>
                  @else
                    <a href="{{ route('property.recommend',['id'=>$pro->id,'state'=>1]) }}" class="btn btn-primary btn-float has-text">
                        <span>Add recommend</span>
                    </a>
                  @endif
                  <form method="post" action="{{route('type.destroy',['id'=>$pro])}}" class="hidden" id="adsForm{{$pro->id}}">
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
        {!! $property->render() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@endsection
@section('script')
  function deleteType(id)
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
        $("#adsForm"+id).submit();
      } else {
        swal("this type is safe!");
      }
    });
  }



  $(document).on('pjax:success', function (xhr, textStatus, options) {
      swal.close();
  });
  $('[data-toggle="popover"]').popover();

@endsection
