@extends ('admin.layouts.app')
@section('content-header')
<div class="row">
  <div class="col-md-4" style="margin-bottom:1%"><button class="btn btn-primary" style="width:100%" onclick="filter('today')">Today</button></div>
  <div class="col-md-4"><button class="btn btn-primary" style="width:100%" onclick="filter('lastWeek')">Last week</button></div>
  <div class="col-md-4"><button class="btn btn-primary" style="width:100%" onclick="filter('lastMonth')">Last month</button></div>
</div>
<div class="row">
  <div class="col-md-4"><button class="btn btn-primary" style="width:100%" onclick="filter('custom')">Custom</button></div>
  <div class="col-md-4">
        <div class="input-group">
            <div id="filterDate2">
              <!-- Datepicker as text field -->
              <div class="input-group date form-group" data-date-format="yyyy-mm-dd">
                <div class="input-group-addon" >
                  <span class="glyphicon glyphicon-th"></span>
                </div>
                <input type="text" class="form-control" name="from" id='from' placeholder="from"
                @if(isset($route))
                  value="{{$route->date}}"
                @endif
                >
              </div>
            </div>
        </div>
  </div>
  <div class="col-md-4">
        <div class="input-group">
            <div id="filterDate2">
              <!-- Datepicker as text field -->
              <div class="input-group date form-group" data-date-format="yyyy-mm-dd">
                <div class="input-group-addon" >
                  <span class="glyphicon glyphicon-th"></span>
                </div>
                <input type="text" class="form-control" name="date" id="to" placeholder="to"
                @if(isset($route))
                  value="{{$route->date}}"
                @endif
                >
              </div>
            </div>
        </div>
  </div>
</div>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3 id="cost">{{$cost}}</h3>

        <p>Tickets Sales Value</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer"></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3 id="ticketCount">{{$ticketsCount}}</h3>

        <p>Tickets number</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="#" class="small-box-footer"></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3 id="maleSolid">{{$maleSolid}}</h3>

        <p>Solid by male</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer"></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3 id="femaleSolid">{{$femaleSolid}}</h3>
        <p>Solid by female</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer"></a>
    </div>
  </div>

@endsection
@section('script')
  function filter(time)
  {
    if(time=="custom")
    {
      var from=$("#from").val();
      var to=$("#to").val();
      var date=from+"*"+to;
      if(from=="")
      {
        alert("Please Add from date");
      }
      if(to=="")
      {
        alert("Please Add to date");
      }
      if(from !="" && to !="")
      {
        $.ajax({
              type: "get",
              url: "/getDashboardCustom",
              data: 'date='+date,
              success: function(result)
              {
                var data=result.split("*");
                $("#ticketCount").html(data[0]);
                $("#maleSolid").html(data[1]);
                $("#femaleSolid").html(data[2]);
                $("#cost").html(data[3]);
              }
          });
      }


    }
    else
    {
      $.ajax({
            type: "get",
            url: "/getDashboard",
            data: 'time='+time,
            success: function(result)
            {
              var data=result.split("*");
              $("#ticketCount").html(data[0]);
              $("#maleSolid").html(data[1]);
              $("#femaleSolid").html(data[2]);
              $("#cost").html(data[3]);
            }
        });

    }
  }

  $('.input-group.date').datepicker({format: "yyyy-mm-dd"});

@endsection
