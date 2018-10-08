@extends ('admin.layouts.app')
@section('content-header')
<a href="{{ route('ads.create') }}" class="btn btn-primary btn-float has-text">
    <i class="fa fa-plus"></i>
    <span>Add new </span>
</a>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Ads</a></li>
    <li class="active">Show</li>
  </ol>
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">

    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manage all ads</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th>Header</th>
            <th>Image</th>
            <th>Page</th>
            <th>Manage</th>
          </tr>
          </thead>
          <?php
          $i=1;
          ?>
          @foreach($ads as $ad)
            <tr>
              <td>{{$i}}</td>
              <td>{{$ad->header}}</td>
              <td>
                @if($ad->image !="")
                <image src="{{asset($ad->image)}}" style="width:40px">
                @endif
              </td>
              <td>{{$ad->page->name}}</td>
              <td>
                <button class="btn btn-danger btn-float has-text" onclick="deleteAds({{$ad->id}})">
                    <i class="fa fa-times"></i>
                    <span>delete</span>
                </button>
                  <a href="{{ route('ads.edit',['id'=>$ad->id]) }}" class="btn btn-primary btn-float has-text">
                      <i class="fa fa-pencil"></i>
                      <span>edit</span>
                  </a>
                  <form method="post" action="{{route('ads.destroy',['id'=>$ad])}}" class="hidden" id="adsForm{{$ad->id}}">
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
        {!! $ads->render() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

@endsection
@section('script')
  function deleteAds(id)
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
        swal("this ad is safe!");
      }
    });
  }



  $(document).on('pjax:success', function (xhr, textStatus, options) {
      swal.close();
  });
  $('[data-toggle="popover"]').popover();

@endsection
